<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            
            <ul class="nav">
                
                @if(auth()->user()->level=="2")
                <li><a href="{{ url('murid/tugas/index', []) }}" class="active"><i class="lnr lnr-bookmark"></i> <span> Tugas Saya</span> &nbsp;<span class="badge badge-secondary">{{$tugas_saya->count()}}</span></h1> </a></li>                        
                <li><a href="{{ url('murid/jawab/index', []) }}" class="active"><i class="lnr lnr-bookmark"></i> <span> Pengumpulan Tugas</span></a></li>                        
                <li><a href="{{ url('murid/informasi/index', []) }}" class="active"><i class="lnr lnr-tag"></i> <span>Informasi Jadwal</span></a></li>
                <li><a href="{{ url('murid/materi2/index', []) }}" class="active"><i class="lnr lnr-book"></i> <span>Materi</span></a></li>
                <li><a href="{{ url('murid/soal2/index', []) }}" class="active"><i class="lnr lnr-bookmark"></i> <span>Latihan</span></a></li>
                <li><a href="{{ url('murid/nilai2/index', []) }}" class="active"><i class="lnr lnr-chart-bars"></i> <span>Nilai</span></a></li>
                
                @endif
                @if(auth()->user()->level=="1")
                <li><a href="{{ url('guru/soal/index', []) }}" class="active"><i class="lnr lnr-bookmark"></i> <span>Tugas</span></a></li>
                <li><a href="{{ url('guru/jawab2/index', []) }}" class="active"><i class="lnr lnr-file-empty""></i> <span>Jawaban Murid</span></a></li>
                <li><a href="{{ url('guru/materi/index', []) }}" class="active"><i class="lnr lnr-book"></i> <span>Materi</span></a></li>
                <li><a href="{{ url('guru/nilai/index', []) }}" class="active"><i class="lnr lnr-chart-bars"></i> <span>Nilai</span></a></li>
                @endif

                @if(auth()->user()->level=="0")
                <li><a href="{{ url('guru/guru/index', []) }}" class="active"><i class="lnr lnr-users"></i> <span>Data Guru</span></a></li>
                <li><a href="{{ url('admin/murid/index', []) }}" class="active"><i class="lnr lnr-users"></i> <span>Data Murid</span></a></li>
                @endif

                @if(auth()->user()->level=="0")
                <li><a href="{{ url('admin/kelas/index', []) }}" class="active"><i class="lnr lnr-home"></i> <span>Data Kelas</span></a></li>
                <li><a href="{{ url('admin/mapel/index', []) }}" class="active"><i class="fa fa-book"></i> <span>Data Mapel</span></a></li>
                <li><a href="{{ url('admin/jadwal/index', []) }}" class="active"><i class="fa fa-calendar"></i> <span>Data Jadwal</span></a></li>
                @endif

            </ul>
        </nav>
    </div>
</div>