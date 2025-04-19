<div class="training-calendar my-8 p-4 bg-white shadow rounded">
  <h2 class="text-2xl font-bold mb-4">Training Calendar</h2>
  <table class="min-w-full border-collapse border border-gray-200">
    <thead>
      <tr>
        <th class="border border-gray-300 px-4 py-2">Training Name</th>
        <th class="border border-gray-300 px-4 py-2">January</th>
        <th class="border border-gray-300 px-4 py-2">February</th>
        <th class="border border-gray-300 px-4 py-2">March</th>
        <th class="border border-gray-300 px-4 py-2">April</th>
        <th class="border border-gray-300 px-4 py-2">May</th>
        <th class="border border-gray-300 px-4 py-2">June</th>
        <th class="border border-gray-300 px-4 py-2">July</th>
        <th class="border border-gray-300 px-4 py-2">August</th>
        <th class="border border-gray-300 px-4 py-2">September</th>
        <th class="border border-gray-300 px-4 py-2">October</th>
        <th class="border border-gray-300 px-4 py-2">November</th>
        <th class="border border-gray-300 px-4 py-2">December</th>
      </tr>
    </thead>
    <tbody>
      @php
          $months = [
            1 => 'January', 2 => 'February', 3 => 'March', 4 => 'April',
            5 => 'May', 6 => 'June', 7 => 'July', 8 => 'August',
            9 => 'September', 10 => 'October', 11 => 'November', 12 => 'December',
          ];
      @endphp
      @forelse($trainings as $training)
        @php 
          $startMonth = !empty($training->training_start_date) ? (int) date('n', strtotime($training->training_start_date)) : null;
          $endMonth = !empty($training->training_end_date) ? (int) date('n', strtotime($training->training_end_date)) : null;
        @endphp
        <tr>
          <td class="border border-gray-300 px-4 py-2">{{ $training->training_name }}</td>
          @foreach($months as $monthNum => $monthName)
            @php
              $tdClass = "border border-gray-300 px-4 py-2 text-center";
              $cellContent = "-";
              if($startMonth && $endMonth) {
                if($monthNum === $startMonth && $monthNum === $endMonth) {
                  $tdClass .= " bg-green-500 text-black";
                  $cellContent = "Start: " . date('d M', strtotime($training->training_start_date)) . "<br>End: " . date('d M', strtotime($training->training_end_date));
                } elseif($monthNum === $startMonth) {
                  $tdClass .= " bg-green-500 text-black";
                  $cellContent = date('d M', strtotime($training->training_start_date));
                } elseif($monthNum === $endMonth) {
                  $tdClass .= " bg-green-500 text-black";
                  $cellContent = "End: " . date('d M', strtotime($training->training_end_date));
                } elseif($monthNum > $startMonth && $monthNum < $endMonth) {
                  $tdClass .= " bg-green-500 text-black";
                  $cellContent = "";
                }
              } else {
                if($startMonth === $monthNum){
                  $tdClass .= " bg-green-500 text-black";
                  $cellContent = date('d M', strtotime($training->training_start_date));
                }
              }
              // Jika cell merupakan bagian dari periode training aktif, tambahkan data attributes dan klik event ke seluruh cell
              $tdAttributes = "";
              if($startMonth) {
                if($endMonth) {
                  if($monthNum >= $startMonth && $monthNum <= $endMonth) {
                      $tdAttributes = ' data-training-name="'. $training->training_name .'" data-training-start-date="'. $training->training_start_date .'" data-training-end-date="'. $training->training_end_date .'" onclick="openTrainingModal(this)" style="cursor: pointer;"';
                  }
                } else {
                  if($monthNum === $startMonth) {
                      $tdAttributes = ' data-training-name="'. $training->training_name .'" data-training-start-date="'. $training->training_start_date .'" data-training-end-date="'. $training->training_end_date .'" onclick="openTrainingModal(this)" style="cursor: pointer;"';
                  }
                }
              }
            @endphp
            <td class="{{ $tdClass }}" {!! $tdAttributes !!}>
              {!! $cellContent !!}
            </td>
          @endforeach
        </tr>
      @empty
        <tr>
          <td colspan="13" class="border border-gray-300 px-4 py-2 text-center">No training data available.</td>
        </tr>
      @endforelse
    </tbody>
  </table>

  <div id="trainingModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white p-6 rounded shadow-lg w-1/3">
      <h3 class="text-xl font-bold mb-4" id="modalTitle">Training Detail</h3>
      <p id="modalContent"></p>
      <button onclick="closeTrainingModal()" class="mt-4 bg-red-500 text-white px-3 py-1 rounded">Close</button>
    </div>
  </div>

  <script>
    function openTrainingModal(el) {
      var modal = document.getElementById('trainingModal');
      var title = document.getElementById('modalTitle');
      var content = document.getElementById('modalContent');
      var name = el.getAttribute('data-training-name');
      var start = el.getAttribute('data-training-start-date');
      var end = el.getAttribute('data-training-end-date');
      title.textContent = name;
      content.innerHTML = '<strong>Start Date:</strong> ' + start + '<br><strong>End Date:</strong> ' + end;
      modal.classList.remove('hidden');
    }
    function closeTrainingModal() {
      var modal = document.getElementById('trainingModal');
      modal.classList.add('hidden');
    }
    // Menutup modal ketika area di luar konten diklik
    document.getElementById('trainingModal').addEventListener('click', function(e) {
      if(e.target === this) {
        closeTrainingModal();
      }
    });
  </script>
</div>
