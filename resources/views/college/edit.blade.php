<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش دانشکده</title>
</head>
<body>
    @include('header')
    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">ویرایش دانشکده</h1>
    <div class="w-9/12 m-auto mb-5">
        <a href="{{ route('college.colleges') }}" class="p-2 text-xs rounded-full border bg-red-300 transition-all duration-200 hover:bg-rose-600 hover:text-white">
            بازگشت
        </a>
    </div>

    <form action="{{ route('college.update') }}" method="post" class="w-1/2 m-auto border rounded-lg p-5">
        @csrf
        <input type="hidden" name="id" value="{{ $college->id }}">
        <div class="mb-10">
            <label for="name" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام دانشکده :</label>
            <input type="text" name="name" id="name" class="w-full outline-none border rounded-md px-10 py-3" value="{{ $college->name }}">
        </div>
        <h2 class="text-2xl font-bold text-gray-700">لیست دانشگاه ها :</h2>
        <select name="uni_id" class="my-5 mr-10">
            @foreach($unis as $uni)
            <option value="{{ $uni->id }}" class="text-lg font-normal text-gray-700 mb-3 inline-block" @if($uni->id == $college->university->id) {{ 'selected' }} @endif> دانشگاه {{ $uni->name . " " . $uni->city }}</option>
            @endforeach
        </select>
        <div class="text-center">
            <button type="submit" class="px-10 py-2 rounded-md border bg-gray-300 text-lg transition-all duration-200 hover:bg-gray-600 hover:text-white">
                ثبت
            </button>
        </div>
    </form>
</body>
</html>