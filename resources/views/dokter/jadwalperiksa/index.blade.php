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
                    <header class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Daftar Jadwal Periksa') }}
                        </h2>
                        <div class="flex-col items-center justify-center text-center">
                            <a href="{{ route('dokter.jadwalperiksa.create') }}" class="btn btn-primary w-full sm:w-auto bg-blue-600 hover:bg-blue-700 rounded-full">Tambah
                                Jadwal</a>

                            @if (session('status') === 'jadwalperiksa-created')
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                                    {{ __('Created.') }}
                                </p>
                            @endif
                        </div>
                    </header>

                    <div class="overflow-x-auto w-full rounded mt-4">
                        <table class="table table-hover min-w-full">
                            <thead class="bg-gray-300">
                                <tr>
                                    <th scope="col" class="text-center font-bold text-gray-700 whitespace-nowrap">No</th>
                                    <th scope="col" class="text-center font-bold text-gray-700 whitespace-nowrap">Hari</th>
                                    <th scope="col" class="text-center font-bold text-gray-700 whitespace-nowrap">Jam Mulai</th>
                                    <th scope="col" class="text-center font-bold text-gray-700 whitespace-nowrap">Jam Selesai</th>
                                    <th scope="col" class="text-center font-bold text-gray-700 whitespace-nowrap">Status</th>
                                    <th scope="col" class="text-center font-bold text-gray-700 whitespace-nowrap">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jadwals as $jadwal)
                                    <tr class="align-middle hover:bg-blue-50 transition border-b border-blue-100">
                                        <th scope="row" class="text-center text-gray-700 whitespace-nowrap">{{ $loop->iteration }}</th>
                                        <td class="text-center font-semibold text-black whitespace-nowrap">{{ $jadwal->hari }}</td>
                                        <td class="text-center whitespace-nowrap">{{ \Carbon\Carbon::parse($jadwal->jam_mulai)->format('H:i') }}</td>
                                        <td class="text-center whitespace-nowrap">{{ \Carbon\Carbon::parse($jadwal->jam_selesai)->format('H:i') }}</td>
                                        <td class="text-center whitespace-nowrap">
                                            <span class="inline-block min-w-[80px] px-3 py-1 rounded-full text-xs font-bold shadow-sm
                                                {{ $jadwal->status ? 'bg-green-200 text-green-700 border border-green-200' : 'bg-red-200 text-gray-600 border border-gray-300' }}">
                                                {{ $jadwal->status ? 'Aktif' : 'Tidak Aktif' }}
                                            </span>
                                        </td>
                                        <td class="text-center whitespace-nowrap flex flex-col sm:flex-row items-center gap-2 justify-center">
                                            <form action="{{ route('dokter.jadwal.toggle-status', $jadwal->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm {{ $jadwal->status ? 'btn-outline-secondary' : 'btn-outline-success' }} rounded-pill px-4 py-1 shadow-sm transition-all duration-150 hover:scale-105 w-full sm:w-auto">
                                                    {{ $jadwal->status ? 'Nonaktifkan' : 'Aktifkan' }}
                                                </button>
                                            </form>
                                            <a href="{{ route('dokter.jadwalperiksa.edit', $jadwal->id) }}" class="btn btn-warning btn-sm rounded-pill px-4 py-1 shadow-sm transition-all duration-150 hover:scale-105 w-full sm:w-auto">Edit</a>
                                            <form action="{{ route('dokter.jadwalperiksa.destroy', $jadwal->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jadwal ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm rounded-pill px-4 py-1 shadow-sm transition-all duration-150 hover:scale-105 w-full sm:w-auto">Delete</button>
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
                    </div>
                </section>
            </div>
        </div>
    </div>
</x-app-layout>