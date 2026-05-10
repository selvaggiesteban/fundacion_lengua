<?php

namespace App\Http\Controllers;

use App\Models\AccountingEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountingEntryController extends Controller
{
    public function destroy(AccountingEntry $accountingEntry)
    {
        try {
            $accountingEntry->delete();
            return response()->json(['success' => true, 'message' => 'Asiento contable eliminado exitosamente']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Error al eliminar el asiento contable: ' . $e->getMessage()]);
        }
    }
}
