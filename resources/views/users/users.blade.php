<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست یوزر ها</title>
</head>
<body>
    @include('header')

    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">لیست یوزر</h1>

    <div class="w-9/12 m-auto">
        <a href="{{ route('user.create') }}" class="inline-block px-5 py-2 transition-all duration-200 border rounded-md bg-amber-300 hover:bg-amber-500 text-gray-700 font-semibold hover:text-white">
            ایجاد یوزر جدید
        </a>
    </div>
    <div class="mt-10 w-2/3 m-auto">
        <div class="w-full p-5 grid grid-cols-7 gap-5 text-center border-b mb-3 text-lg text-gray-700 font-semibold">
            <span>
                آیدی
            </span>
            <span>
                نام
            </span>
            <span>
                نام خانوادگی
            </span>
            <span>
               سمت
            </span>
            <div class="col-span-3 border-r">
                دکمه ها
            </div>
        </div>
    </div>
    <div class="mt-10 w-2/3 m-auto">
        @foreach($users as $user)
        <div class="w-full p-5 grid grid-cols-7 gap-5 text-center border-b mb-3 text-lg font-normal text-gray-700">
            <span>
                {{ $user->id }}
            </span>
            <span>
                {{ $user->name }}
            </span>
            <span>
                {{ $user->family }}
            </span>
            <span>
                {{ $user['resps']->name }}
            </span>
            <div class="col-span-3 border-r">
                <a href="{{ route('user.single', ['id'=>$user->id] ) }}" class="font-semibold text-sm bg-lime-300 text-gray-700 transition-all duration-200 hover:bg-green-600 hover:text-white mx-1 border rounded-md px-3 py-1">نمایش</a>
                <a href="{{ route('user.edit', ['id'=>$user->id] ) }}" class="font-semibold text-sm bg-blue-300 mx-1 border rounded-md text-gray-700 transition-all duration-200 hover:bg-blue-600 hover:text-white px-3 py-1">ویرایش</a>
                <a href="{{ route('user.delete', ['id'=>$user->id] ) }}" class="font-semibold text-sm bg-red-300 mx-1 border rounded-md text-gray-700 transition-all duration-200 hover:bg-rose-600 hover:text-white px-3 py-1">حذف</a>
                <a href="{{ route('user.details', ['id'=>$user->id] ) }}" class="font-semibold text-sm bg-orange-300 mx-1 border rounded-md text-gray-700 transition-all duration-200 hover:bg-orange-600 hover:text-white px-3 py-1">جزئیات</a>
            </div>
        </div>
        @endforeach
    </div>
</body>
</html>