

<div class="row">
        <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4 py-4 bg-white">
            <h2>Nuevo Producto</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre del Producto" autofocus />
                </div>
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="descripcion" placeholder="Descripción del Producto" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="programadores" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="programadores" />
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-success">Guardar</button>
                    <button class="btn btn-secondary">Limpiar</button>
                </div>
            </form>
        </div>