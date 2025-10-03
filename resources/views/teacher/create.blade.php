<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ثبت استاد</title>
</head>
<body>
    @include('header')
    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">ثبت استاد</h1>
    <div class="w-9/12 m-auto mb-5">
        <a href="{{ route('teacherteachers') }}" class="p-2 text-xs rounded-full border bg-red-300 transition-all duration-200 hover:bg-rose-600 hover:text-white">
            بازگشت
        </a>
    </div>

    <form action="{{ route('teacher.store') }}" method="post" class="w-1/2 m-auto border rounded-lg p-5">
        @csrf
        <div class="mb-10">
            <label for="name" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام :</label>
            <input type="text" name="name" id="name" class="w-full outline-none border rounded-md px-10 py-3" placeholder="نام را وارد کنید">
        </div>
        <div class="mb-10">
            <label for="family" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام خانوادگی :</label>
            <input type="text" name="family" id="family" class="w-full outline-none border rounded-md px-10 py-3" placeholder="نام خانوادگی را وارد کنید">
        </div>
        <h2 class="text-2xl font-bold text-gray-700">لیست دانشگاه ها :</h2>
       <ul class="mt-5">
        <?php $i=1; ?>
            @foreach($unis as $uni)
            
            <li>
                <div>
                    <?php echo $i; $i++; $j=1; ?>
                    <input type="checkbox" name="unis[{{$uni['uni_data']-> id}}]" id="uni">
                    <label for="uni">{{ $uni['uni_data']->name . " " . $uni['uni_data']->city }}</label>
                </div>
                <ul class="my-1 mr-10">
                    @foreach($uni['colleges'] as $college)
                   
                    <li>
                        <div>
                            <?php echo $j; $j++;$k=1; ?>
                            <input type="checkbox" name="unis[{{$uni['uni_data']-> id}}][{{ $college['college_data']->id }}]" id="college" value="{{ $college['college_data']->id }}">
                            <label for="college">{{ $college['college_data']->name }}</label>
                        </div>
                        <ul class="my-1 mr-10">
                           @foreach($college['majors'] as $major)
                            <li>
                                <?php echo $k; $k++;$l=1; ?>
                                <input type="checkbox" name="unis[{{$uni['uni_data']-> id}}][{{ $college['college_data']->id }}][{{ $major['major_data']->id }}]" id="major" value="{{ $major['major_data']->id }}">
                                <label for="major">{{ $major['major_data']->name }}</label>
                            </li>
                            <ul class="my-1 mr-10">
                                @foreach($major['lessons'] as $lesson)

                                <li>
                                    <?php echo $l; $l++; ?>
                                    <input type="checkbox" name="unis[{{ $uni['uni_data']->id }}][{{ $college['college_data']->id }}][{{ $major['major_data']->id }}][{{ $lesson->id }}]"  value="{{ $lesson->id }}" id="lesson">
                                    <label for="lesson">{{ $lesson->name }}</label>
                                </li>
                                @endforeach
                            </ul>

                           @endforeach
                        </ul>
                    </li>
                    @endforeach
                </ul>
            </li>
            @endforeach
       </ul>
        <div class="text-center">
            <button type="submit" class="px-10 py-2 rounded-md border bg-gray-300 text-lg transition-all duration-200 hover:bg-gray-600 hover:text-white">
                ثبت
            </button>
        </div>
    </form>

</body>
</html>