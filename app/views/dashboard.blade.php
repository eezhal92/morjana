@foreach($students as $student)
  {{ $student->people->full_name }} <br>
@endforeach