{{-- JS Files for Templating --}}

<script src="{{ asset('template/assets/static/js/initTheme.js') }}"></script>

<script src="{{ asset('template/assets/static/js/components/dark.js') }}"></script>
<script src="{{ asset('template/assets/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>


<script src="{{ asset('template/assets/compiled/js/app.js') }}"></script>

<!-- Need: Apexcharts -->
<script src="{{ asset('template/assets/extensions/apexcharts/apexcharts.min.js') }}"></script>
<script src="{{ asset('template/assets/static/js/pages/dashboard.js') }}"></script>

<!-- Simple Database -->
<script src="{{ asset('template/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
<script src="{{ asset('template/assets/static/js/pages/simple-datatables.js') }}"></script>

<!-- Select Element -->
<script src="{{ asset('template/assets/extensions/choices.js/public/assets/scripts/choices.js') }}"></script>
<script src="{{ asset('template/assets/static/js/pages/form-element-select.js') }}"></script>

{{-- script sidebar --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const items = document.querySelectorAll('.sidebar-item');

        // Menandai item sidebar yang sesuai dengan URL halaman saat ini sebagai aktif
        const currentURL = window.location.href;
        items.forEach(item => {
            const link = item.querySelector('a.sidebar-link');
            if (link && link.href === currentURL) {
                item.classList.add('active');
            }

            item.addEventListener('click', function() {
                // Hapus kelas 'active' dari semua item
                items.forEach(i => i.classList.remove('active'));

                // Tambahkan kelas 'active' pada item yang diklik
                this.classList.add('active');
            });
        });
    });
</script>

<script>
    //paging Form
    /*
document.addEventListener('DOMContentLoaded', function() {
    let currentStep = 1;
    const totalSteps = 3;

    function showStep(step) {
        for (let i = 1; i <= totalSteps; i++) {
            document.getElementById(`step-${i}`).style.display = (i === step) ? 'block' : 'none';
        }
    }

    document.getElementById('next-step-1').addEventListener('click', function() {
        currentStep++;
        showStep(currentStep);
    });

    document.getElementById('prev-step-2').addEventListener('click', function() {
        currentStep--;
        showStep(currentStep);
    });

    document.getElementById('next-step-2').addEventListener('click', function() {
        currentStep++;
        showStep(currentStep);
    });

    document.getElementById('prev-step-3').addEventListener('click', function() {
        currentStep--;
        showStep(currentStep);
    });

    showStep(currentStep);
});
*/
</script>

<script>
    let outcomeCount = 1;
    document.getElementById('add-outcome').addEventListener('click', function() {
        outcomeCount++;
        const outcomeWrapper = document.getElementById('outcome-wrapper');
        const newOutcomeGroup = document.createElement('div');
        newOutcomeGroup.classList.add('form-group', 'd-flex');
        newOutcomeGroup.id = 'outcome-group-' + outcomeCount;
        newOutcomeGroup.innerHTML = `
        <input type="text" name="outcomes[]" class="form-control" placeholder="Outcome">
        <button type="button" class="btn btn-danger ms-2 remove-outcome">Delete</button>`;
        outcomeWrapper.appendChild(newOutcomeGroup);
    });

    // Adding dynamic Indikator input fields
    let indikatorCount = 1;
    document.getElementById('add-indikator').addEventListener('click', function() {
        indikatorCount++;
        const indikatorWrapper = document.getElementById('indikator-wrapper');
        const newIndikatorGroup = document.createElement('div');
        newIndikatorGroup.classList.add('form-group', 'd-flex');
        newIndikatorGroup.id = 'indikator-group-' + indikatorCount;
        newIndikatorGroup.innerHTML = `
        <input type="text" name="indikators[]" class="form-control" placeholder="Indikator">
        <button type="button" class="btn btn-danger ms-2 remove-indikator">Delete</button>`;
        indikatorWrapper.appendChild(newIndikatorGroup);
    });

    document.addEventListener('DOMContentLoaded', function() {
        const categories = ['persiapan', 'pelaksanaan', 'pelaporan'];

        categories.forEach(function(category) {
            let aktivitasCount = 1;
            let kebutuhanCount = 1;

            // Tambah Aktivitas (Add More for Aktivitas)
            document.querySelector(`.add-aktivitas[data-category="${category}"]`).addEventListener('click', function() {
                aktivitasCount++;
                const wrapper = document.getElementById(`${category}-wrapper`);
                const newGroup = document.createElement('div');
                newGroup.classList.add('form-group', 'd-flex', 'align-items-center', 'mb-2');
                newGroup.id = `${category}-group-${aktivitasCount}`;
                newGroup.innerHTML = `
                <input type="date" name="waktu_${category}[]" class="form-control me-2" placeholder="Waktu ${category}">
                <textarea name="penjelasan_${category}[]" class="form-control me-2" placeholder="Penjelasan ${category}" rows="1"></textarea>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#kebutuhanAnggaranModal-${category}">Tambah Kebutuhan Anggaran</button>
            `;
                wrapper.appendChild(newGroup);
            });

            // Tambah Kebutuhan Anggaran (Add More for Kebutuhan Anggaran)
            document.querySelector(`.add-kebutuhan-anggaran[data-category="${category}"]`).addEventListener('click', function() {
                kebutuhanCount++;
                const wrapper = document.getElementById(`kebutuhan-anggaran-wrapper-${category}`);
                const newGroup = document.createElement('div');
                newGroup.classList.add('form-group', 'd-flex', 'align-items-center', 'mb-2');
                newGroup.id = `kebutuhan-anggaran-group-${kebutuhanCount}-${category}`;
                newGroup.innerHTML = `
                <input type="text" name="uraian_aktivitas_${category}[]" class="form-control me-2" placeholder="Uraian Aktivitas">
                <input type="number" name="frekwensi_${category}[]" class="form-control me-2" placeholder="Frekwensi">
                <input type="number" name="nominal_volume_${category}[]" class="form-control me-2" placeholder="Nominal Volume">
                <input type="text" name="satuan_volume_${category}[]" class="form-control me-2" placeholder="Satuan Volume">
                <button type="button" class="btn btn-danger remove-kebutuhan-anggaran">Hapus</button>
            `;
                wrapper.appendChild(newGroup);
            });

            // Hapus Kebutuhan Anggaran
            document.addEventListener('click', function(event) {
                if (event.target.classList.contains('remove-kebutuhan-anggaran')) {
                    event.target.parentElement.remove();
                }
            });
        });
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-outcome')) {
            event.target.parentElement.remove();
        }
        if (event.target.classList.contains('remove-indikator')) {
            event.target.parentElement.remove();
        }
    });
</script>