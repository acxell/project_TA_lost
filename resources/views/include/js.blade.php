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
    // Adding dynamic Outcome input fields
    let outcomeCount = 1;
    document.getElementById('add-outcome').addEventListener('click', function() {
        outcomeCount++;
        const outcomeWrapper = document.getElementById('outcome-wrapper');
        const newOutcomeGroup = document.createElement('div');
        newOutcomeGroup.classList.add('form-group');
        newOutcomeGroup.id = 'outcome-group-' + outcomeCount;
        newOutcomeGroup.innerHTML = `<input type="text" name="outcomes[]" class="form-control" placeholder="Outcome">`;
        outcomeWrapper.appendChild(newOutcomeGroup);
    });

    // Adding dynamic Indikator input fields
    let indikatorCount = 1;
    document.getElementById('add-indikator').addEventListener('click', function() {
        indikatorCount++;
        const indikatorWrapper = document.getElementById('indikator-wrapper');
        const newIndikatorGroup = document.createElement('div');
        newIndikatorGroup.classList.add('form-group');
        newIndikatorGroup.id = 'indikator-group-' + indikatorCount;
        newIndikatorGroup.innerHTML = `<input type="text" name="indikators[]" class="form-control" placeholder="Indikator">`;
        indikatorWrapper.appendChild(newIndikatorGroup);
    });

    const categories = ['persiapan', 'pelaksanaan', 'pelaporan'];

    categories.forEach(function(category) {
        let count = 1;
        document.getElementById('add-' + category).addEventListener('click', function() {
            count++;
            const wrapper = document.getElementById(category + '-wrapper');
            const newGroup = document.createElement('div');
            newGroup.classList.add('form-group');
            newGroup.id = category + '-group-' + count;
            newGroup.innerHTML = `
            <input type="date" name="waktu_${category}[]" class="form-control mt-2" placeholder="Waktu ${category}">
            <textarea name="penjelasan_${category}[]" class="form-control mt-2" placeholder="Penjelasan ${category}"></textarea>`;
            wrapper.appendChild(newGroup);
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
document.addEventListener('DOMContentLoaded', function() {
    const categories = ['persiapan', 'pelaksanaan', 'pelaporan'];

    categories.forEach(function(category) {
        let count = 1;
        document.getElementById('add-' + category).addEventListener('click', function() {
            count++;
            const wrapper = document.getElementById(category + '-wrapper');
            const newGroup = document.createElement('div');
            newGroup.classList.add('form-group');
            newGroup.id = category + '-group-' + count;
            newGroup.innerHTML = `
            <input type="date" name="waktu_${category}[]" class="form-control mt-2" placeholder="Waktu ${category}">
            <textarea name="penjelasan_${category}[]" class="form-control mt-2" placeholder="Penjelasan ${category}"></textarea>

            <!-- Dynamic Budget Section -->
            <div id="${category}-budget-wrapper-${count}">
                <div class="form-group">
                    <label>Uraian Aktivitas</label>
                    <input type="text" name="uraian_${category}_${count}[]" class="form-control" placeholder="Uraian Aktivitas">

                    <label>Frekuensi</label>
                    <input type="number" name="frekwensi_${category}_${count}[]" class="form-control" placeholder="Frekuensi">

                    <label>Nominal Volume</label>
                    <input type="number" name="nominal_volume_${category}_${count}[]" class="form-control" placeholder="Nominal Volume">

                    <label>Satuan Volume</label>
                    <input type="text" name="satuan_volume_${category}_${count}[]" class="form-control" placeholder="Satuan Volume">

                    <label>Jumlah</label>
                    <input type="number" name="jumlah_${category}_${count}[]" class="form-control" placeholder="Jumlah">
                </div>
            </div>
            <button type="button" class="btn btn-primary me-1 mb-1" id="add-budget-${category}-${count}">Add More Budget</button>
            `;
            wrapper.appendChild(newGroup);

            document.getElementById(`add-budget-${category}-${count}`).addEventListener('click', function() {
                const budgetWrapper = document.getElementById(`${category}-budget-wrapper-${count}`);
                const newBudgetGroup = document.createElement('div');
                newBudgetGroup.classList.add('form-group');
                newBudgetGroup.innerHTML = `
                <label>Uraian Aktivitas</label>
                <input type="text" name="uraian_${category}_${count}[]" class="form-control mt-2" placeholder="Uraian Aktivitas">

                <label>Frekuensi</label>
                <input type="number" name="frekwensi_${category}_${count}[]" class="form-control mt-2" placeholder="Frekuensi">

                <label>Nominal Volume</label>
                <input type="number" name="nominal_volume_${category}_${count}[]" class="form-control mt-2" placeholder="Nominal Volume">

                <label>Satuan Volume</label>
                <input type="text" name="satuan_volume_${category}_${count}[]" class="form-control mt-2" placeholder="Satuan Volume">

                <label>Jumlah</label>
                <input type="number" name="jumlah_${category}_${count}[]" class="form-control mt-2" placeholder="Jumlah">
                `;
                budgetWrapper.appendChild(newBudgetGroup);
            });
        });
    });
});
</script>
