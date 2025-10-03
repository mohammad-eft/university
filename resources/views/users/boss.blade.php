<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت جزئیات رییس</title>
</head>
<body>
    @include('header')
    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">ثبت جزئیات رییس</h1>
    <div class="w-9/12 m-auto mb-5">
        <a href="{{ route('user.users') }}" class="p-2 text-xs rounded-full border bg-red-300 transition-all duration-200 hover:bg-rose-600 hover:text-white">
            بازگشت
        </a>
    </div>
    <!-- باید یک متد از باس کنترولر را کال کند برای ثبت جزئیات بیشتر -->
    <form action="{{ route('user.save_detail') }}" method="post" class="w-1/2 m-auto border rounded-lg p-5">
        @csrf
        <input type="hidden" name="id" value="{{ $user->id }}">
        <div class="mb-10">
            <label for="name" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام رییس :</label>
            <input type="text" name="name" id="name" class="w-full outline-none border rounded-md px-10 py-3" value="{{ $user->name }}">
        </div>
        <div class="mb-10">
            <label for="family" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام خانوادگی رییس :</label>
            <input type="text" name="family" id="family" class="w-full outline-none border rounded-md px-10 py-3" value="{{ $user->family }}">
        </div>
        <div class="mb-10">
            <label for="uni" class="text-lg font-normal text-gray-700 mb-3 inline-block">دانشگاه :</label>
            <select name="uni" id="uni">
                @foreach($user->unis as $uni)
                <option value="{{ $uni->id }}">{{ $uni->name . " " . $uni->city }}</option>
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