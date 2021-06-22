<div class="form-group">
    <div class="row">
        <div class="col">
            <label>Data</label>
            <input type="date" value="{{ date('Y-m-d') }}" class="form-control" id="data" name="data" required>
        </div>
        <div class="col">
            <label>Hora</label>
            <input type="time" value="{{ date('H:i') }}" class="form-control" id="hora" name="hora" required>
        </div>
    </div>
</div>