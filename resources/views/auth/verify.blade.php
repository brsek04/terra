@extends('layouts')

@section('content')

<section class="flex min-h-screen justify-center items-center" >
    <div class="bg-gray-100 flex rounded-2xl shadow-xl max-w-3xl p-5 items-center">
       <div class="px-8 w-full">
          <h2 class="font-bold text-2xl text-[#002D74]"> Verifica tu correo electrónico</h2>
          <div class=" py-5 w-full">
             @if (session('resent'))
             <div class="p-4 mb-4 text-sm border border-green-300 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                <span class="font-medium">A fresh verification link has been sent to your email address</span>
             </div>
             @endif
             <p class="text-xs mt-2 font-bold  text-[#002D74]">Before proceeding, please check your email for a verification link.If you did not receive
                the email,</p>
                <a href="#" class="text-xs font-semibold underline hover:no-underline  text-[#002D74]">click here to request another</a>
         </div>
       </div>
    </div>
 </section>




 <!--
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Verify Your Email Address</h3>

                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">A fresh verification link has been sent to
                                your email address
                            </div>
                        @endif
                        <p>Before proceeding, please check your email for a verification link.If you did not receive
                            the email,</p>
                        <a href="{{ route('verification.resend') }}">click here to request another'</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
-->
@endsection