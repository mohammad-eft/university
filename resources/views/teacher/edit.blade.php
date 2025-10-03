<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ویرایش درس</title>
</head>
<body>
    @include('header')
    <h1 class="text-center text-3xl font-bold text-gray-700 my-10">ویرایش درس</h1>
    <div class="w-9/12 m-auto mb-5">
        <a href="{{ route('teacher.teachers') }}" class="p-2 text-xs rounded-full border bg-red-300 transition-all duration-200 hover:bg-rose-600 hover:text-white">
            بازگشت
        </a>
    </div>

    <form action="{{ route('teacher.update') }}" method="post" class="w-1/2 m-auto border rounded-lg p-5">
        @csrf
        <input type="hidden" name="id" value="{{ $teacher->id }}">
        <div class="mb-10">
            <label for="name" class="text-lg font-normal text-gray-700 mb-3 inline-block">نام درس :</label>
            <input type="text" name="name" id="name" class="w-full outline-none border rounded-md px-10 py-3" value="{{ $teacher->name }}">
        </div>
        <div class="mb-10">
            <label for="unit" class="text-lg font-normal text-gray-700 mb-3 inline-block"> تعداد واحد :</label>
            <input type="text" name="unit" id="unit" class="w-full outline-none border rounded-md px-10 py-3" value="{{ $teacher->unit }}">
        </div>
        <h2 class="text-2xl font-bold text-gray-700">لیست دانشگاه ها :</h2>
       <ul class="mt-5">
        <?php $i=1; ?>
            @foreach($universities as $university)
            
            <li>
                <div>
                    <?php echo $i; $i++; $j=1; ?>
                    <input type="checkbox" name="unis[{{$university['uni_data']-> id}}]" id="uni" @if(in_array($university['uni_data']->id, $lesson->unis)){{ 'checked' }} @endif>
                    <label for="uni">{{ $university['uni_data']->name . " " . $university['uni_data']->city }}</label>
                </div>
                <ul class="my-1 mr-10">
                    @foreach($university['colleges'] as $college)
                   
                    <li>
                        <div>
                            <?php echo $j; $j++;$k=1; ?>
                            <input type="checkbox" name="unis[{{$university['uni_data']-> id}}][{{ $college['college_data']->id }}]" id="college" value="{{ $college['college_data']->id }}" @if(in_array($college['college_data']->id, $lesson->colleges)){{ 'checked' }} @endif>
                            <label for="college">{{ $college['college_data']->name }}</label>
                        </div>
                        <ul class="my-1 mr-10">
                           @foreach($college['majors'] as $major)
                            <div>
                                <?php echo $k; $k++; ?>
                                <input type="checkbox" name="unis[{{$university['uni_data']-> id}}][{{ $college['college_data']->id }}][{{ $major->id }}]" id="college" value="{{ $major }}" @if(in_array($major->id, $lesson->majors)){{ 'checked' }} @endif>
                                <label for="college">{{ $major->name }}</label>
                            </div>


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