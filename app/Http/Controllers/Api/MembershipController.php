<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Membership;
use Illuminate\Http\Request;

class MembershipController extends Controller
{
    function index() {
        $memberships = Membership::where('publication_status', 'active')->get();

        return response()->json([
            'success' => true,
            'data'    => $memberships,
            'message' =>'All Active Membership Plans',
        ], 200);
    }

    function show($membership_id) {
        $membership = Membership::where('publication_status', 'active')->where('id', $membership_id)->first();

        return response()->json([
            'success' => true,
            'data'    => $membership,
            'message' =>'Specific Membership Plan',
        ], 200);
    }
}
