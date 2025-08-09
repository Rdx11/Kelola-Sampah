<div class="mt-5 py-5" id="panduan">
    <section class="d-md-block py-5 d-none dark-background" id="cara-kerja">
        <div class="container">
            <h2 class="mb-5 text-center fw-bold">Panduan Pelaporan</h2>
            <p class="text-center text-leading">
                Berikut langkah-langkah untuk kontribusi dalam
                pelaporan sampah
            </p>
            <div class="stepper">
                <div class="step" data-aos="fade-up" data-aos-delay="200">
                    <div class="circle">1</div>
                    <div class="label">Ambil Foto</div>
                    <span class="text-secondary">
                        Foto lokasi sampah yang ditemukan
                    </span>
                    <img src="frontend/asset/gambar-event-1.jpg" alt="" class="shadow mt-3 rounded"
                      style="aspect-ratio: 16/9; width: 300px" />
                </div>

                <div class="step" data-aos="fade-up" data-aos-delay="400">
                    <div class="circle">2</div>
                    <div class="label">Isi Detail</div>
                    <span class="text-secondary">Lokasi dan deskripsi singkat kondisi</span>
                    <img src="frontend/asset/gambar-event-2.jpg" alt="" class="shadow mt-3 rounded"
                      style="aspect-ratio: 16/9; width: 300px" />
                </div>

                <div class="step" data-aos="fade-up" data-aos-delay="600">
                    <div class="circle">3</div>
                    <div class="label">Kirim Laporan</div>
                    <span class="text-secondary">Langsung diterima oleh petugas</span>
                    <img src="frontend/asset/gambar-event-3.jpg" alt="" class="shadow mt-3 rounded"
                      style="aspect-ratio: 16/9; width: 300px" />
                </div>
            </div>
            <div class="mt-5 text-center">
                <a href="{{ route('create.report') }}" class="btn btn-primary">Lapor Sekarang</a>
            </div>
        </div>
    </section>

    <section class="py-5 dark-background d-md-none" id="cara-kerja">
        <div class="container">
            <h2 class="mb-5 text-center fw-bold">Panduan Pelaporan</h2>
            <p class="text-center text-leading">
                Berikut langkah-langkah untuk kontribusi dalam
                pelaporan sampah
            </p>
            <div class="vertical-stepper">
                <div class="step-item">
                    <h5 class="fw-bold">1. Ambil Foto</h5>
                    <p class="text-secondary">
                        Dokumentasikan sampah di lokasi kejadian
                        secara langsung.
                    </p>
                    <img src="frontend/asset/gambar-event-1.jpg" alt="" class="shadow mt-3 rounded"
                      style="aspect-ratio: 16/9; width: 300px" />
                </div>

                <div class="step-item">
                    <h5 class="fw-bold">
                        2. Isi Detail Lokasi & Deskripsi
                    </h5>
                    <p class="text-secondary">
                        Masukkan informasi lokasi dan deskripsi
                        kondisi sampah secara singkat.
                    </p>
                    <img src="frontend/asset/gambar-event-2.jpg" alt="" class="shadow mt-3 rounded"
                      style="aspect-ratio: 16/9; width: 300px" />
                </div>

                <div class="step-item">
                    <h5 class="fw-bold">3. Kirim Laporan</h5>
                    <p class="text-secondary">
                        Laporan akan diterima dan ditindaklanjuti
                        oleh petugas kebersihan.
                    </p>
                    <img src="frontend/asset/gambar-event-3.jpg" alt="" class="shadow mt-3 rounded"
                      style="aspect-ratio: 16/9; width: 300px" />
                </div>
            </div>
            <div class="mt-5 text-center">
                <a href="{{ route('create.report') }}" class="btn btn-primary">Lapor Sekarang</a>
            </div>
        </div>
    </section>
</div>