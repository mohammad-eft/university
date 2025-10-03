<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>سمت</title>
</head>
<body>
    @include('header')

    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">سمت {{ $resp->name }}</h1>

    <div class="w-9/12 m-auto">
        <a href="{{ route('resp.responsibilities') }}" class="inline-block px-5 py-2 transition-all duration-200 border rounded-md bg-amber-300 hover:bg-amber-500 text-gray-700 font-semibold hover:text-white">
            بازگشت
        </a>
    </div>
    <div class="mt-10 w-2/3 m-auto">
        <div class="w-full p-5 grid grid-cols-4 gap-5 text-center border-b mb-3 text-lg text-gray-700 font-semibold">
            <span>
                آیدی
            </span>
            <span>
                نام سمت
            </span>
            <div class="col-span-2 border-r">
                دکمه ها
            </div>
        </div>
    </div>
    <div class="mt-10 w-2/3 m-auto">
        <div class="w-full p-5 grid grid-cols-4 gap-5 text-center border-b mb-3 text-lg font-normal text-gray-700">
            <span>
                {{ $resp->id }}
            </span>
            <span>
                {{ $resp->responsibility }}
            </span>
            <div class="col-span-2 border-r">
                <a href="{{ route('resp.edit', ['id'=>$resp->id] ) }}" class="font-semibold text-sm bg-blue-300 mx-1 border rounded-md text-gray-700 transition-all duration-200 hover:bg-blue-600 hover:text-white px-3 py-1">ویرایش</a>
                <a href="{{ route('resp.delete', ['id'=>$resp->id] ) }}" class="font-semibold text-sm bg-red-300 mx-1 border rounded-md text-gray-700 transition-all duration-200 hover:bg-rose-600 hover:text-white px-3 py-1">حذف</a>
            </div>
        </div>
    </div>
</body>
</html>