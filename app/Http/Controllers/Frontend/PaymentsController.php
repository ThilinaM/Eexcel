<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPaymentRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\BankDetail;
use App\Models\Course;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PaymentsController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payments = Payment::with(['course', 'payment_methord', 'bank_details', 'created_by', 'media'])->get();

        return view('frontend.payments.index', compact('payments'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methords = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bank_details = BankDetail::all()->pluck('account_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.payments.create', compact('courses', 'payment_methords', 'bank_details'));
    }

    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->all());

        if ($request->input('transtraction_copy', false)) {
            $payment->addMedia(storage_path('tmp/uploads/' . basename($request->input('transtraction_copy'))))->toMediaCollection('transtraction_copy');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $payment->id]);
        }

        return redirect()->route('frontend.payments.index');
    }

    public function edit(Payment $payment)
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $courses = Course::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment_methords = PaymentMethod::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bank_details = BankDetail::all()->pluck('account_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment->load('course', 'payment_methord', 'bank_details', 'created_by');

        return view('frontend.payments.edit', compact('courses', 'payment_methords', 'bank_details', 'payment'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());

        if ($request->input('transtraction_copy', false)) {
            if (!$payment->transtraction_copy || $request->input('transtraction_copy') !== $payment->transtraction_copy->file_name) {
                if ($payment->transtraction_copy) {
                    $payment->transtraction_copy->delete();
                }
                $payment->addMedia(storage_path('tmp/uploads/' . basename($request->input('transtraction_copy'))))->toMediaCollection('transtraction_copy');
            }
        } elseif ($payment->transtraction_copy) {
            $payment->transtraction_copy->delete();
        }

        return redirect()->route('frontend.payments.index');
    }

    public function show(Payment $payment)
    {
        abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->load('course', 'payment_methord', 'bank_details', 'created_by');

        return view('frontend.payments.show', compact('payment'));
    }

    public function destroy(Payment $payment)
    {
        abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentRequest $request)
    {
        Payment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('payment_create') && Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Payment();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
