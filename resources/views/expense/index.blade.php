<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('Expense') }}
    </h2>
  </x-slot>

  <div class=" max-w-full mx-auto sm:px-6 lg:px-8 space-y-6 text-white">


    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.4/index.global.min.js'></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {

                // use laravel expenses passed from controller and make it json in order to be used in js
                const events = @json($events);
                // same with total costs
                const costs = @json($costs);

        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
           
            
          initialView: 'dayGridMonth',
          

          customButtons: {
    myCustomButton: {
      text: 'Total Cost ' +  costs,
    //   click: function() {
        // alert('clicked the custom button!');
    //   }
    }
  },
  headerToolbar: {
    left: 'prev,next today',
    center: 'title',
    right: 'myCustomButton'
  },
// Add events from the database
  events: events,
  // When a user clicks on an event display it to him
  eventClick: function(info) {
    // Find expense's id
    const expenseID = info.event.id;
    // Redirect to the specific expense
    // Pass an empty string because a parameter is needed after that add the id
    window.location.href = "{{ route('expense.show', '')}}"+"/"+expenseID;
    

    // change the border color just for fun
    info.el.style.borderColor = 'red';
  }
        });

        calendar.render();
        
      });

      
    </script>

    <body>
      <div id='calendar'></div>
    </body>

  </div>
</x-app-layout>