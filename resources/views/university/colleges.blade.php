<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لیست دانشکده های دانشگاه</title>
</head>
<body>
    @include('header')

    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">لیست دانشکده های دانشگاه {{ $uni->name }}</h1>

    <div class="w-9/12 m-auto">
        <a href="{{ route('uni.universities') }}" class="inline-block px-5 py-2 transition-all duration-200 border rounded-md bg-amber-300 hover:bg-amber-500 text-gray-700 font-semibold hover:text-white">
            بازگشت
        </a>
    </div>
    <div class="mt-10 w-2/3 m-auto">
        <div class="w-full p-5 grid grid-cols-5 gap-5 text-center border-b mb-3 text-lg text-gray-700 font-semibold">
            <span>
                آیدی
            </span>
            <span>
                نام دانشگاه
            </span>
            <span>
                شهر
            </span>
            <div class="col-span-2 border-r">
               دانشکده ها
            </div>
        </div>
    </div>
    <div class="mt-10 w-2/3 m-auto">
        <div class="w-full p-5 grid grid-cols-5 gap-5 text-center border-b mb-3 text-lg font-normal text-gray-700">
            <span>
                {{ $uni->id }}
            </span>
            <span>
                {{ $uni->name }}
            </span>
            <span>
                {{ $uni->city }}
            </span>
            <div class="col-span-2 border-r text-start overflow-y-auto h-auto pr-3">
                @if($uni->colleges)
                <?php $i = 1; ?>
                @foreach($uni->colleges as $college)
                <span class="block">
                    <?= $i." : "; ?>{{ $college->name }}
                    <?php $i++ ?>
                </span>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</body>
</html>