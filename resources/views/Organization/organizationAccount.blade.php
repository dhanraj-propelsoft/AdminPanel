@extends('layouts.dashboard.app')
@section('content')
    <div class="user0 account0 for-active"></div>
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($organisation as $org)
                        <?php $orgId = $org['orgId']; ?>
                        {{-- onclick="window.location.href='{{url('setOrganizationId',$org['orgId'])}}'" --}}
                        <tr>
                            <td class="organizationName" orgId="{{ $org['orgId'] }}">{{ $org['org_name'] }}</td>
                            <td>Dummy Data</td>
                            <td>Dummy Data</td>
                        </tr>
                    @endforeach


                </tbody>
                <tfoot>
            </table>
            <br><br>

        </div>
    </div>
    <!--End Table-->
    <script>
        document.querySelector(".propel-breadcrumb-extra-content").innerHTML =
            `<a href="{{ route('createOrganisationPage') }}"><button class='propelbtn propelbtncurved propeladd propel-hover'>Create</button></a>`;
        $('.organizationName').click(function() {
            var orgId = $(this).attr('orgId');
            var orgName = $(this).text();
            if (orgId && orgName) {
                $.ajax({
                    url: "{{ route('setOrganizationId') }}",
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
@endsection
