<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBankDetailRequest;
use App\Http\Requests\StoreBankDetailRequest;
use App\Http\Requests\UpdateBankDetailRequest;
use App\Models\BankDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BankDetailsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bank_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankDetails = BankDetail::all();

        return view('frontend.bankDetails.index', compact('bankDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('bank_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.bankDetails.create');
    }

    public function store(StoreBankDetailRequest $request)
    {
        $bankDetail = BankDetail::create($request->all());

        return redirect()->route('frontend.bank-details.index');
    }

    public function edit(BankDetail $bankDetail)
    {
        abort_if(Gate::denies('bank_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.bankDetails.edit', compact('bankDetail'));
    }

    public function update(UpdateBankDetailRequest $request, BankDetail $bankDetail)
    {
        $bankDetail->update($request->all());

        return redirect()->route('frontend.bank-details.index');
    }

    public function show(BankDetail $bankDetail)
    {
        abort_if(Gate::denies('bank_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.bankDetails.show', compact('bankDetail'));
    }

    public function destroy(BankDetail $bankDetail)
    {
        abort_if(Gate::denies('bank_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyBankDetailRequest $request)
    {
        BankDetail::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
