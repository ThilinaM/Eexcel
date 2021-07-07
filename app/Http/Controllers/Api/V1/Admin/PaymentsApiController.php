<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Resources\Admin\PaymentResource;
use App\Models\Payment;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentsApiController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('payment_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentResource(Payment::with(['course', 'payment_methord', 'bank_details', 'created_by'])->get());
    }

    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->all());

        if ($request->input('transtraction_copy', false)) {
            $payment->addMedia(storage_path('tmp/uploads/' . basename($request->input('transtraction_copy'))))->toMediaCollection('transtraction_copy');
        }

        return (new PaymentResource($payment))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(Payment $payment)
    {
        abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new PaymentResource($payment->load(['course', 'payment_methord', 'bank_details', 'created_by']));
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

        return (new PaymentResource($payment))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(Payment $payment)
    {
        abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
