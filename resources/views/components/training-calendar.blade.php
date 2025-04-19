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
                      $tdAttributes = ' data-training-name="'. $training->training_name .'"'
                      . ' data-training-start-date="'. $training->training_start_date .'"'
                      . ' data-training-end-date="'. $training->training_end_date .'"'
                      . ' data-training-description="'. $training->training_description .'"'
                      . ' data-training-location="'. $training->training_location .'"'
                      . ' data-training-time="'. $training->training_time .'"'
                      . ' onclick="openTrainingModal(this)" style="cursor: pointer;"';
                  }
                } else {
                  if($monthNum === $startMonth) {
                      $tdAttributes = ' data-training-name="'. $training->training_name .'"'
                      . ' data-training-start-date="'. $training->training_start_date .'"'
                      . ' data-training-end-date="'. $training->training_end_date .'"'
                      . ' data-training-description="'. $training->training_description .'"'
                      . ' data-training-location="'. $training->training_location .'"'
                      . ' data-training-time="'. $training->training_time .'"'
                      . ' onclick="openTrainingModal(this)" style="cursor: pointer;"';
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

  <!-- Ubah disini: modal dengan header, content, dan footer -->
  <div id="trainingModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded shadow-lg w-3/4">
      <!-- Modal Header -->
      <div id="modalHeader" style="background-color: rgba(56, 178, 172, 1); padding: 1rem; color: white; width: 100%;" class="p-6 mb-4 rounded-t">
        <h3 class="text-xl font-bold" id="modalTitle">Training Detail</h3>
      </div>
      <!-- Modal Content with 2 columns -->
      <div id="modalBody" class="flex p-6">
        <div class="w-1/3">
          <img id="modalImage" src="https://placehold.co/600x400" alt="Dummy Image" class="cursor-pointer" onclick="openImagePopup(this)">
        </div>
        <div class="w-2/3 pl-4">
          <p id="modalContent"></p>
        </div>
      </div>
      <!-- Modal Footer -->
      <div id="modalFooter" class="p-6 mt-4">
        <button onclick="closeTrainingModal()" class="bg-red-500 text-white px-3 py-1 rounded mx-auto block">Close</button>
      </div>
    </div>
  </div>

  <!-- Image Popup -->
  <div id="imagePopup" class="fixed inset-0 flex items-center justify-center hidden" style="z-index: 9999; backdrop-filter: blur(10px);">
    <img id="popupImage" src="" alt="Enlarged Image" class="max-w-full max-h-full rounded shadow-lg" style="margin-top: 0;">
    <!-- <button onclick="closeImagePopup()" class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded">Close</button> -->
  </div>

  <script>
    function openTrainingModal(el) {
      var modal = document.getElementById('trainingModal');
      var title = document.getElementById('modalTitle');
      var content = document.getElementById('modalContent');
      var name = el.getAttribute('data-training-name');
      var description = el.getAttribute('data-training-description');
      var location = el.getAttribute('data-training-location');
      var start = el.getAttribute('data-training-start-date');
      var end = el.getAttribute('data-training-end-date');
      // Format tanggal menjadi "11 DESEMBER 2022" (semua uppercase)
      var formattedStart = new Date(start).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }).toUpperCase();
      var formattedEnd = new Date(end).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }).toUpperCase();
      var time = '<strong>WAKTU PELAKSANAAN:</strong><br>Mulai : ' + formattedStart + '<br>Selesai : ' + formattedEnd + '<br><br>';
      title.textContent = 'Training Details';
      content.innerHTML =
        '<strong>NAMA PELATIHAN:</strong><br> ' + name + '<br><br>' +
        '<strong>URAIAN PELATIHAN:</strong><br> ' + description + '<br><br>' +
        '<strong>LOKASI:</strong><br> ' + location + '<br><br>' +
        time;
      modal.classList.remove('hidden');
    }

    function closeTrainingModal() {
      var modal = document.getElementById('trainingModal');
      modal.classList.add('hidden');
    }

    function openImagePopup(img) {
      var popup = document.getElementById('imagePopup');
      var popupImage = document.getElementById('popupImage');
      popupImage.src = img.src;
      popup.classList.remove('hidden');
    }

    function closeImagePopup() {
      var popup = document.getElementById('imagePopup');
      popup.classList.add('hidden');
    }

    // Menutup modal ketika area di luar konten diklik
    document.getElementById('trainingModal').addEventListener('click', function(e) {
      if(e.target === this) {
        closeTrainingModal();
      }
    });

    document.getElementById('imagePopup').addEventListener('click', function(e) {
      if (e.target === this) {
        closeImagePopup();
      }
    });
  </script>
</div>
