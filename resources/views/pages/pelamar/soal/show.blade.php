@extends('layout.master')
@section('title')
  Soal
@endsection
@section('breadcrumb')
  Soal
@endsection
@section('content')
  <!-- END: Top Bar -->
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">
      Soal
    </h2>
  </div>
  <!-- BEGIN: Datatable -->
  <div class="intro-y datatable-wrapper box p-5 mt-5">
    <table class="table table-report table-report--bordered display datatable w-full" id="table">
      <thead>
        <tr>
          <th class="border-b-2 text-leftwhitespace-no-wrap">No</th>
          <th class="border-b-2 text-left whitespace-no-wrap">Soal</th>
          <th class="border-b-2 text-center whitespace-no-wrap">Jawaban</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($data as $soal)
          <tr>
            <td class="border-b w-1">
              <div class="font-medium whitespace-no-wrap">{{ $loop->iteration }}</div>
            </td>
            <td class="text-left border-b w-1/4">{{ $soal->soal }}</td>
            <td class="border-b w-full">
              <div class="mt-1">
                <textarea id="about" name="about" rows="3"
                  class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md py-2"></textarea>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- END: Datatable -->

  <script type="text/javascript">
    $('#table').DataTable({
      pageLength: 1
    });
  </script>
@endsection
