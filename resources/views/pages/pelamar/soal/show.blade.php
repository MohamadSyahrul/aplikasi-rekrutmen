@extends('layout.master')
@section('title')
  Soal
@endsection
@section('breadcrumb')
  Soal
@endsection
@section('content')
  <!-- END: Top Bar -->
  <div class="flex items-center mt-8">
      <h2 class="intro-y text-lg font-medium mr-auto">
          Kuis Soal
      </h2>
  </div>
  <!-- BEGIN: Wizard Layout -->
  <div class="intro-y box py-10 sm:py-20 mt-5">
    <form id="soalForm" action="#">
      <div class="flex justify-center">
        <?php $n=1; ?>
        @foreach($data as $dt)
        <a class="step intro-y w-10 h-10 rounded-full button bg-gray-200 text-gray-600 mx-2 {{ Request::is('pelamar/soal/<?=$dt->nama_soal?>*') ? '' : '' }}"
            href="#{{$dt->nama_soal}}">
            <div class="flex-1 truncate">{{$n++}}</div>
        </a>
        @endforeach
      </div>
      <div class="px-5 mt-10">
          <div class="font-medium text-center text-lg">Jawablah Dengan Teliti</div>
          <div class="text-gray-600 text-center mt-2">Total Soal: {{$data->count()}}, Dengan Nilai Maksimal {{$data->sum('bobot_soal')}} Poin</div>
      </div>
      <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200">
        @foreach($data as $dt)
        <div class="tab intro-y box lg:mt-5" id="<?= $dt->nama_soal ?>" style="display: none">
          <div class="flex items-center p-5 border-b border-gray-200">
            <h2 class="font-medium text-base mr-auto">{{$dt->nama_soal}}</h2>
          </div>
          <div class="accordion p-5">
            <div class="accordion__pane active border border-gray-200 p-4">
              <a href="javascript:;" class="accordion__pane__toggle font-medium block">{{$dt->soal}}</a>
            <div class="accordion__pane__content mt-3 text-gray-700 leading-relaxed">
              <input placeholder="Jawaban" oninput="this.className = 'input w-full border mt-2 flex-1'" name="kunci_jawaban" class="input w-full border mt-2 flex-1">
            </div>
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
  <!-- END: Wizard Layout -->

  
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
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
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("soalForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}
</script>
@endsection
