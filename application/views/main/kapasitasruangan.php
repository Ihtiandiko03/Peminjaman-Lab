<section class="intro">
  <div class="bg-image h-100">
    <div class="mask d-flex align-items-center h-100" >
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div class="table-responsive" >
                <div class="w-95 w-md-75 w-lg-60 w-xl-55 mx-auto mb-6 text-center">
                    <h3 class="display-18 display-md-16 display-lg-12 mb-2">Kapasitas Ruangan</h3>
                </div>
                  <table class="table table-hover mb-0">
                    <thead>
                      <tr>
                        <th scope="col">Nama Lab</th>
                        <th scope="col">Lokasi</th>
                        <th scope="col">Kapasitas</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php foreach($lab as $l) : ?>
                            <tr>
                              <th scope="row"><?=$l['nama_lab']?></th>
                              <td><?=$l['lokasi']?></td>
                              <td><?=$l['kapasitas']?> Orang</td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<style>
    html,
    body,
    .intro {
    height: 100%;
    }

    table td,
    table th {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden;
    }

    .card {
    border-radius: .5rem;
    }
</style>