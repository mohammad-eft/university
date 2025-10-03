<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت یوزر</title>
</head>
<body>
    @include('header')
    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">ثبت یوزر</h1>
    <div class="w-9/12 m-auto mb-5">
        <a href="{{ route('user.users') }}" class="p-2 text-xs rounded-full border bg-red-300 transition-all duration-200 hover:bg-rose-600 hover:text-white">
            بازگشت
        </a>
    </div>

    <form action="{{ route('user.store') }}" method="post" class="w-1/2 m-auto border rounded-lg p-5">
        @csrf
        <div class="mb-10">
            <label for="name" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام یوزر :</label>
            <input type="text" name="name" id="name" class="w-full outline-none border rounded-md px-10 py-3" placeholder="نام یوزر را وارد کنید">
        </div>
        <div class="mb-10">
            <label for="family" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام خانوادگی یوزر :</label>
            <input type="text" name="family" id="family" class="w-full outline-none border rounded-md px-10 py-3" placeholder="نام خانوادگی یوزر را وارد کنید">
        </div>
        <div class="mb-10">
            <label for="resp" class="text-lg font-normal text-gray-700 mb-3 inline-block">سمت :</label>
            <select name="resp" id="resp">
                @foreach($resps as $resp)
                <option value="{{ $resp->id }}">{{ $resp->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="text-center">
            <button type="submit" class="px-10 py-2 rounded-md border bg-gray-300 text-lg transition-all duration-200 hover:bg-gray-600 hover:text-white">
                ثبت
            </button>
        </div>
    </form>
</body>
</html>