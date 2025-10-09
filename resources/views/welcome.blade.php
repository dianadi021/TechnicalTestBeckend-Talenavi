@extends('layouts.app')

@section('title', 'Fullstack Talenavi')

@section('root_container')
    <main class="w-full flex items-center justify-center h-screen">
        <div id="loginSection">
            @include('layouts.partials.login')
        </div>
    </main>

    <script>
        // ONLOAD START
        $(document).ready(function() {
            $("#loginSection").show();
        })
        // ONLOAD END

        // FUNCTION ON CHECK START
        // FUNCTION ON CHECK END

        // FUNCTIONS START
        function submitForm($section) {
            event.preventDefault();
            $(".hide_notif").hide();

            Swal.fire({
                title: "Apakah yakin ingin melanjutkan?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                cancelButtonText: "Batal",
                confirmButtonText: "Lanjutkan"
            }).then((result) => {
                if (result.isConfirmed) {
                    $("#clientRegist").show();
                    $(".csrf-token").val($('meta[name="csrf-token"]').attr('content'));

                    $(".hideBtnProcess").hide();
                    LoadingNotify("Sedang diproses, mohon tunggu!", "info", true);

                    if ($section == "loginForm") {
                        LoginAjaxSection($("#loginForm").serializeArray(), $('meta[name="csrf-token"]').attr('content'));
                    }
                }
            });
        }
        // FUNCTIONS END
    </script>
@endsection
