@extends('layouts.main')

@section('content')

<body class="bg-[#93cddd]">
    <img src="/img/line.png" alt="" class="">
    <div class="w-[50%] bg-white h-[550px] absolute left-96 top-32 rounded-lg">
        <div>
            <img src="/img/smk.png" alt="" class="w-10 ml-8 mt-7 absolute">
        </div>

        <div class="flex">
            <div class="ml-20 mt-24 mr-20">
                <div class="flex">
                    <p class="mr-36 font-semibold text-slate-500">Register</p>
                    <a href="/login/index" class="text-sky-500 text-xs mt-2">Login</a>
                </div>

                <form action="/login/register/add" method="POST" class="mt-4">
                    @csrf
                    <div class="w-56">
                        <input type="text" id="name" name="name"
                            class="form-control rounded-sm h-9 text-xs font-semibold placeholder-[#b3b3b3] border-[#b3b3b3]"
                            placeholder="Username" />
                    </div>
                    <div class="w-56 mt-3">
                        <input type="email" id="email" name="email"
                            class="form-control rounded-sm h-9 text-xs font-semibold placeholder-[#b3b3b3] border-[#b3b3b3]"
                            placeholder="Email" />
                    </div>
                    <div class="w-56 mt-3">
                        <input type="password" id="password" name="password"
                            class="form-control rounded-sm h-9 text-xs font-semibold placeholder-[#b3b3b3] border-[#b3b3b3]"
                            placeholder="Password" />
                    </div>

                    <button type="submit"
                        class="text-sm hover:bg-[#93cddd] bg-[#42a7c3] w-56 h-8 font-semibold text-white rounded mt-8">Register</button>
                </form>

                <p class="text-[10px] mt-4">Forgot your password? <a href="#" class="text-sky-500">Click here</a></p>

                <div class="flex h-10 mt-4 relative">
                    <hr class="w-16 bg-[#e7e7e7]">
                    <p class="text-[10px] absolute bottom-8 left-[68px] text-[#b3b3b3]">atau daftar dengan</p>
                    <hr class="w-16 ml-24">
                </div>

                <div class="block absolute">
                    <button
                        class="text-sm bg-white w-56 h-8 font-semibold border-2 text-slate-400 rounded flex pl-20 pt-[4px] relative">
                        <img src="/img/google.png" alt="" class="w-5 mr-1 absolute top-1">
                        <p class="ml-6 text-[11px]">Google</p>
                    </button>

                    <button
                        class="text-sm bg-white w-56 h-8 font-semibold border-2 text-slate-400 rounded flex pl-20 pt-[4px] relative mt-2">
                        <img src="/img/facebook.png" alt="" class="w-4 mr-1 absolute top-1">
                        <p class="ml-6 text-[11px]">Facebook</p>
                    </button>
                </div>
            </div>

            <div class="bg-[#42a7c3] w-96 h-[520px] rounded-lg mr-4 mt-3">

                <div class="w-80 h-[430px]  mx-auto mt-11 border border-white rounded-lg relative">
                    <div class="h-full w-full rounded-lg bg-white opacity-30 backdrop-blur-sm "></div>
                    <p class="text-white absolute top-7 left-6 font-semibold text-lg">New Student <br>Admission
                        2024/2025</p>
                    <img src="/img/cina.png" alt="" class="absolute top-[13px] w-[277px] left-16">
                </div>

            </div>
        </div>
    </div>
</body>

@endsection
