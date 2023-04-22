@extends('layouts.dashboard.app')
@section('content')
    <div class="user0 default-login0 for-active"></div>

    <style>
        table tbody tr:hover {
            background-color: var(--propel-color-10) !important;
            color: white !important;
            text-shadow: 9px 3px 18px rgba(131, 121, 121, 0.6);

        }

        table tbody tr:hover td {
            height: 70px !important;
            font-weight: bold;

        }

        table tbody tr td {
            vertical-align: middle !important;
        }
    </style>

    <!--Table-->
    <div class="container col-md-10 m-4">
        <div class="row">
            <h2 style="margin:0 auto;">Select an Account to manage settings</h2>

            <table class="table table-hover table-special-hover table-bordered">
                <thead>
                    <tr>
                        <th>Account</th>
                        <th>Type</th>
                        <th>Role</th>
                        <th>Preferred</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organisation as $org)
                        <?php $orgId = $org['orgId']; ?>

                        <tr>
                            <td> {{ $org['org_name'] }}</td>
                            <td>Dummy Data</td>
                            <td>Dummy Data</td>
                            <td><label class="checkbox">
                                    <input type="checkbox" value="{{ $org['orgId'] }}"
                                        <?php if ($org['default_org']==1){ ?>checked<?php } ?> orgName="{{ $org['org_name'] }}"
                                        class="checkbox-input defaultOrg">
                                    <span class="checkmark"></span>
                                </label></td>
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
            </table>
            <br><br>

        </div>
    </div>
    <style>
        .checkbox {
            display: inline-block;
            vertical-align: middle;
            position: relative;
            width: 20px;
            height: 20px;
        }

        .checkmark {
            position: absolute;
            top: 0;
            left: 0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid #000000;
        }

        .checkbox input[type="checkbox"] {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .checkbox input[type="checkbox"]:checked+.checkmark {
            background-color: #4CAF50;
            border-color: #4CAF50;
            rotate: 45deg;
        }

        .checkbox input[type="checkbox"]:checked+.checkmark:after {
            content: "";
            display: block;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 6px;
            height: 12px;
            border: solid white;
            border-width: 0 2px 2px 0;
            transform-origin: bottom left;
            /* rotate:45deg; */
        }
    </style>
    <script>
        const checkboxInputs = document.querySelectorAll('.checkbox-input');

        checkboxInputs.forEach(input => {
            input.addEventListener('click', () => {
                checkboxInputs.forEach(otherInput => {
                    if (otherInput !== input) {
                        otherInput.checked = false;
                    }
                });
            });
        });
        $('.defaultOrg').click(function() {
            var orgName = $(this).attr('orgName');
            var orgId = $(this).val();
            if (orgName && orgId) {
                $.ajax({
                    url: "{{ route('setDefaultOrganization') }}",
                    type: 'ajax',
                    method: 'post',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        orgId: orgId,
                        orgName: orgName
                    },
                    success: function(data) {
                        var orgId = data.orgId;
                        var orgName = data.orgName;
                        if (orgId && orgName) {
                            location.reload();
                        }
                    },
                    error: function() {}
                });
            }
        });
    </script>
    <!--End Table-->
@endsection
