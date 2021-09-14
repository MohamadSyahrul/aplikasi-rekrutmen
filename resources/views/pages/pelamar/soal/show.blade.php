@extends('layout.master')
@section('title')
  Soal
@endsection
@section('breadcrumb')
  Soal
@endsection
@section('content')

  <div class="flex items-center mt-8">
      <h2 class="intro-y text-lg font-medium mr-auto">
          Kuis Soal
      </h2>
  </div>

  <div class="intro-y box py-10 sm:py-20 mt-5">

    <div class="flex justify-center">
    <?php $n=1; ?>
    <form id="soalForm" action="{{route('pelamar.jawabanStore')}}" method="POST">
      @csrf
      <input type="hidden" value="{{$data[0]->kuis->loker_id}}" name="lamaran_id">
      <input type="hidden" value="{{$data[0]->kuis->loker->lamaran[0]->pelamar_id}}" name="pelamar_id">
      <div class="flex justify-center">
        <?php $n=1; ?>
        <?php $k=1; ?>
        @foreach($data as $dt)
        <a class="step intro-y w-10 h-10 rounded-full button bg-gray-200 text-gray-600 mx-2 {{ Request::is('pelamar/soal/<?=$dt->nama_soal?>*') ? '' : '' }}"
            href="#{{$dt->nama_soal}}">
            <div class="flex-1 truncate">{{$n++}}</div>
        </a>
        @endforeach
      </div>
    </div>
      <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200">
        <div class="font-medium text-center text-lg">Jawablah Dengan Teliti </div>
        <div class="text-gray-600 text-center mt-2">Total Soal: {{$data->count()}}, Dengan Nilai Maksimal {{$data->sum('bobot_soal')}} Poin</div>
        <div id="demo" class="font-large text-center text-lg"></div>
      </div>
      <div id="jawabanSoal" class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200">
        @foreach($data as $key => $dt)
        <div class="tab intro-y box lg:mt-5" id="<?= $dt->nama_soal ?>" style="display: none">
          <div class="flex items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">Soal Nomor {{$dt->nama_soal}}</h2>
          </div>
          <div class="accordion p-5">
            <div class="accordion__pane active border border-gray-200 p-4">
              <a href="javascript:;" class="accordion__pane__toggle font-medium block">{{$dt->soal}}</a>
            </div>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
              <input placeholder="Jawaban" oninput="this.className = 'input w-full border mt-2 flex-1'" name="jawaban[{{$key}}]" class="input w-full border mt-2 flex-1">
              <input name="soal_id[{{$key}}]" type='hidden' value='{{$dt->id}}'>
            </div>
          </div>
        </div>
        @endforeach
        <div class="intro-y col-span-12 flex items-center justify-center sm:justify-end mt-5">
          <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="button w-24 justify-center block bg-gray-200 text-gray-600">Previous</button>
          <button type="button" id="nextBtn" onclick="nextPrev(1)" class="button w-24 justify-center block bg-theme-1 text-white ml-2" >Next</button>
        </div>
    </form>
  </div>

<script>

  var currentTab = 0;
  showTab(currentTab);

  function showTab(n) {
    
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    
    if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
    } else {
      document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
      document.getElementById("nextBtn").innerHTML = "Next";
    }
    
    fixStepIndicator(n)
  }

  function nextPrev(n) {
    
    var x = document.getElementsByClassName("tab");
    
    if (n == 1 && !validateForm()) return false;
    
    x[currentTab].style.display = "none";
    
    currentTab = currentTab + n;
    
    if (currentTab >= x.length) {
    
      document.getElementById("soalForm").submit();
      return false;
    }
    
    showTab(currentTab);
  }

  function validateForm() {
    
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    
    for (i = 0; i < y.length; i++) {
    
      if (y[i].value == "") {
    
        y[i].className += " invalid";
    
        valid = false;
      }
    }
    
    if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid;
  }

  function fixStepIndicator(n) {
    
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    
    x[n].className += " active";
  }


  function fixStepIndicator(n) {
    
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    
    x[n].className += " active";
  }


  var countDownClose = new Date('{{$data[0]->kuis->waktu_selesai}}').getTime();
  var countDownOpen = new Date('{{$data[0]->kuis->waktu_mulai}}').getTime();

  var x = setInterval(function() {

    var now = new Date().getTime();

    var open = countDownOpen - now;
    var distance = countDownClose - now;
    var t = 10000;
    console.log(open, distance);

    var days = Math.floor(open / (1000 * 60 * 60 * 24));
    var hours = Math.floor((open % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((open % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((open % (1000 * 60)) / 1000);
    
    var days2 = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours2 = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes2 = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds2 = Math.floor((distance % (1000 * 60)) / 1000);


    if(countDownOpen > now )
    {
      setTimeout("location.reload(true);", open);
      document.getElementById("demo").innerHTML = "Akan Dimulai Dalam <br>" + hours + "Jam " + minutes + "Menit " + seconds + "Detik ";
      document.getElementById("jawabanSoal").innerHTML = "<div class='font-medium text-center text-lg'>Silahkan Tunggu <p>Kuis Dimulai Pada {{$data[0]->kuis->waktu_mulai}}</p><br><br><a href='{{route('pelamarKuis.index')}}' class='button w-24 text-center bg-theme-1 text-white ml-2'>Kembali</a> </div>";
      return;
    }
    if(countDownOpen < now)
    {
      document.getElementById("demo").innerHTML = "Akan Selesai Dalam <br>" + hours2 + "Jam " + minutes2 + "Menit " + seconds2 + "Detik ";
    }
    if (countDownClose < now) 
    {
      clearInterval(x);
      document.getElementById("demo").innerHTML = "<br>Waktu Habis";
      document.getElementById("jawabanSoal").innerHTML = "<div class='font-medium text-center text-lg'>Silahkan Tunggu Pengumuman <br><br><a href='{{route('pelamarKuis.index')}}' class='button w-24 text-center bg-theme-1 text-white ml-2'>Kembali</a> </div>"; 
    } 
  }, 1000);

</script>

@endsection
