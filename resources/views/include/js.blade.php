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
</script>