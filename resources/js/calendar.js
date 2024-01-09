document.addEventListener("DOMContentLoaded", function () {
    const calendarGrid = document.getElementById("calendar-grid");
    const currentMonthElement = document.getElementById("current-month");
    const prevMonthButton = document.getElementById("prev-month");
    const nextMonthButton = document.getElementById("next-month");

    const today = new Date();
    let currentMonth = new Date(today.getFullYear(), today.getMonth(), 1);

    function renderCalendar() {
        currentMonthElement.textContent = new Intl.DateTimeFormat("es-MX", { month: "long", year: "numeric" }).format(currentMonth);

        const daysInMonth = new Date(currentMonth.getFullYear(), currentMonth.getMonth() + 1, 0).getDate();
        const firstDay = new Date(currentMonth.getFullYear(), currentMonth.getMonth(), 1).getDay();

        calendarGrid.innerHTML = "";

        for (let i = 0; i < firstDay; i++) {
            const emptyCell = document.createElement("div");
            emptyCell.className = "calendar-day other-month";
            calendarGrid.appendChild(emptyCell);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const currentDay = new Date(currentMonth.getFullYear(), currentMonth.getMonth(), day);

                    const radioInput = document.createElement("input");
            radioInput.type = "radio";
            radioInput.name = "calendar-date"; // Nombre único para el conjunto de radios
            radioInput.value = `${currentMonth.getFullYear()}-${currentMonth.getMonth() + 1}-${day}`; // Valor de la fecha
            radioInput.id = `date-${day}`;

            const label = document.createElement("label");
            label.setAttribute("for", `date-${day}`);
            label.textContent = day;

            const radioCell = document.createElement("div");
            radioCell.className = "calendar-day";

            if (currentDay < today) {
                // Deshabilitar el día anterior a la fecha actual
                radioInput.disabled = true;
                radioCell.classList.add("disabled-day");
            }
            radioCell.appendChild(radioInput);
            radioCell.appendChild(label);

            calendarGrid.appendChild(radioCell);
            radioInput.addEventListener("click", function () {
                // Mover la lógica de solicitud AJAX aquí al seleccionar la fecha
                const selectedDate = radioInput.value;

                var xhr = new XMLHttpRequest();
                xhr.open('GET', '/getHour/' + selectedDate, true);

                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            var response = JSON.parse(xhr.responseText);
                            if ('mensaje' in response) {
                                var horariosDiv = document.getElementById('horariosDiv');
                                horariosDiv.innerHTML = '';

                                var horarios = response.mensaje.split(' '); // Divide los horarios en un array


                if (horarios.length < 2) {
                    var sinCitasTitulo = document.createElement('h4');
                    sinCitasTitulo.textContent = 'Sin horario disponible para este día';
                    horariosDiv.appendChild(sinCitasTitulo);
                } else {
                    horarios.forEach(function (horario) {
                        var radioOption = document.createElement('input');
                        radioOption.type = 'radio';
                        radioOption.name = 'hour';
                        radioOption.id = 'hour' + horario;
                        radioOption.value = horario;

                        var label = document.createElement('label');
                        label.textContent = horario;
                        label.setAttribute('for', 'hour' + horario);

                        var labelContainer = document.createElement('div');
                        labelContainer.classList.add('label-container');
                        labelContainer.appendChild(radioOption);
                        labelContainer.appendChild(label);

                        horariosDiv.appendChild(labelContainer);
                    });
                }
            }  else if ('mensaje' in response) {
                                alert('error');
                            } else {
                                alert('Error en la respuesta: No se encontraron horarios ni mensaje');
                            }
                        } else {
                            alert('Error en la solicitud');
                        }
                    }
                };

                xhr.send();
            });


            radioInput.addEventListener("click", function () {
                // Manejar la selección de la fecha aquí
                const fechaSeleccionada = radioInput.value;
                document.getElementById("date").value = fechaSeleccionada;


            });
        }
    }

    renderCalendar();

    prevMonthButton.addEventListener("click", function () {
        currentMonth.setMonth(currentMonth.getMonth() - 1);
        renderCalendar();
    });

    nextMonthButton.addEventListener("click", function () {
        currentMonth.setMonth(currentMonth.getMonth() + 1);
        renderCalendar();
    });
});


function toggleMenu() {
    const menu = document.querySelector('.header-menu ul');
    menu.classList.toggle('show');
}
