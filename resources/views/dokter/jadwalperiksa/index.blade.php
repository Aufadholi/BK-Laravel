<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Jadwal Periksa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow-sm sm:p-8 sm:rounded-lg">
                <section>
                    <header class="flex items-center justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Daftar Jadwal Periksa') }}
                        </h2>
                        <div class="flex-col items-center justify-center text-center">
                            <a href="{{ route('dokter.jadwalperiksa.create') }}" class="btn btn-primary">Tambah Jadwal</a>

                            @if (session('status') === 'jadwalperiksa-created')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >
                                    {{ __('Created.') }}
                                </p>
                            @endif
                        </div>
                    </header>

                    <table class="table table-hover mt-6 overflow-hidden rounded">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Hari</th>
                                <th scope="col">Jam Mulai</th>
                                <th scope="col">Jam Selesai</th>
                                <th scope="col">Status</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($jadwals as $jadwal)
                                <tr>
                                    <th scope="row" class="align-middle text-start">
                                        {{ $loop->iteration }}
                                    </th>
                                    <td class="align-middle text-start">
                                        {{ $jadwal->hari }}
                                    </td>
                                    <td class="align-middle text-start">
                                        {{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}
                                    </td>
                                    <td class="align-middle text-start">
                                        {{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}
                                    </td>
                                    <td class="align-middle text-start">
                                        <span class="badge {{ $jadwal->status ? 'badge-success' : 'badge-secondary' }}">
                                            {{ $jadwal->status ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                    </td>
                                    <td class="align-middle">
                                        <a href="{{ route('dokter.jadwalperiksa.edit', $jadwal->id) }}" class="btn btn-secondary btn-sm">
                                            Edit
                                        </a>
                                        <form action="{{ route('dokter.jadwalperiksa.destroy', $jadwal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            @if ($jadwals->isEmpty())
                                <tr>
                                    <td colspan="6" class="text-center text-muted py-3">
                                        Belum ada jadwal periksa.
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>
