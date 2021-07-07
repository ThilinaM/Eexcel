<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBankDetailRequest;
use App\Http\Requests\UpdateBankDetailRequest;
use App\Http\Resources\Admin\BankDetailResource;
use App\Models\BankDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BankDetailsApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bank_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankDetailResource(BankDetail::all());
    }

    public function store(StoreBankDetailRequest $request)
    {
        $bankDetail = BankDetail::create($request->all());

        return (new BankDetailResource($bankDetail))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(BankDetail $bankDetail)
    {
        abort_if(Gate::denies('bank_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new BankDetailResource($bankDetail);
    }

    public function update(UpdateBankDetailRequest $request, BankDetail $bankDetail)
    {
        $bankDetail->update($request->all());

        return (new BankDetailResource($bankDetail))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(BankDetail $bankDetail)
    {
        abort_if(Gate::denies('bank_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bankDetail->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
