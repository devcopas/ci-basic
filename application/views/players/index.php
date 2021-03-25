<div class="container mt-3">

	<div class="row mb-3">
		<div class="col-md-3">
		<div class="d-grid gap-2">
		<button type="button" class="btn btn-primary add-btn" data-bs-toggle="modal" data-bs-target="#formModal">
			Add Player
		</button>
		</div>
		</div>
	</div>

	<div class="row search-section mb-3">
		<div class="col-md-4 mb-1">
			<select class="form-select " id="byteam" name="byteam" aria-label="select by team">
				<option value="team" selected>All teams</option>
				<?php foreach( $data['teams'] as $team ) : ?>
				<option value="<?= $team; ?>"><?= $team; ?></option>
				<?php endforeach ; ?>
			</select>	
		</div>
		<div class="col-md-3 mb-1">
			<select class="form-select " id="byposition" name="byposition" aria-label="select by position">
				<option value="position" selected>All positions</option>
				<?php foreach( $data['positions'] as $position ) : ?>
				<option value="<?= $position; ?>"><?= $position; ?></option>
				<?php endforeach ; ?>
			</select>	
		</div>
		<div class="col-md-5 mb-1">
			<div class="input-group">			
				<input type="text" class="form-control" placeholder="Search players by name" aria-label="Recipient's username" aria-describedby="basic-addon2" name="keyword" id="keyword">
				<span class="input-group-text" id="basic-addon2"><i class="bi bi-search"></i></span>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<h3 class="fs-5 text-uppercase">Player List</h3>
			<div class="table-responsive table-scroll">
			<table class="table table-hover align-middle">
				<thead class="table-light">
					<tr>
					<th class="th-sort table-heading__no sorting" scope="col">
					<span>#</span>
					<span class="sort-icon"><i class="bi bi-caret-down-fill"></i></i></span>
					</th>
					<th class="th-sort table-heading__player" scope="col">
					<span>Player</span>
					<span class="sort-icon"><i class="bi bi-caret-down-fill"></i></i></span>
					</th>
					<th class="th-sort table-heading" scope="col" class="team-heading">
					<span>Team</span>
					<span class="sort-icon"><i class="bi bi-caret-down-fill"></i></i></span>
					</th>
					<th class="th-sort table-heading" scope="col">
					<span>Position</span>
					<span class="sort-icon"><i class="bi bi-caret-down-fill"></i></i></span>
					</th>
					<th class="th-sort table-heading" scope="col">
					<span>Height</span>
					<span class="sort-icon"><i class="bi bi-caret-down-fill"></i></i></span>
					</th>
					<th class="th-sort table-heading" scope="col">
					<span>Weight</span>
					<span class="sort-icon"><i class="bi bi-caret-down-fill"></i></i></span>
					</th>
					<th class="table-heading" scope="col"></th>
					</tr>
				</thead>
				<tbody>
          <?php if( count($players) > 0 ) : ?>
        <?php foreach( $players as $key=>$player) : ?>
          <tr>
            <th scope="row" class="table-data__no"><?= $key + 1; ?></th>
            <td class="table-data__player">
            <a href="<?= base_url(); ?>players/detail/<?= $player['id']; ?>" class="text-reset text-decoration-none">
            <div class="d-flex flex-column flex-lg-row ">
            <p class="fw-normal me-1 mb-0" ><?= $player['name']?></p>
            <p class="mb-0"><?= $player['name']?></p>
            </div>
            </a>
          </td>
            <td><?= $player['team'] ?></td>
            <td><?= $player['position'] ?></td>
            <td><?= $player['height'] ?></td>
            <td class="text-center"><div class="w-25 text-end"><?= $player['weight'] ?></div></td>
            <td>
            <div class="dropstart">
              <span class="option-icon" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-three-dots-vertical"></i>
              </span>
              <ul class="dropdown-menu">
                <li><a href="<?= base_url(); ?>players/edit/<?= $player['id']; ?>" class="dropdown-item edit-btn update-btn" data-bs-toggle="modal" data-bs-target="#formModal" data-id="<?= $player['id']; ?>" >Edit</a></li>
                <li><a href="<?= base_url(); ?>players/delete/<?= $player['id'];  ?>" onclick="return confirm('Are you sure you want to delete <?= strtoupper($player['name']); ?> ?')" class="dropdown-item">Delete</a></li>
              </ul>	
            </div>
            </td>
          </tr>
        <?php endforeach; ?>
        <?php else: ?>
        <tr><td colspan="7">
          <p class="text-center fs-5 my-5">Nothing found, try searching again.</p>
        </td></tr>
        <?php endif; ?>
				</tbody>
			</table>
			</div>
		</div>
	</div>

	<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="formModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="formModalLabel">Add Player Data</h5>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="<?= base_url(); ?>players/add" method="post">
			<div class="mb-3">
				<label for="name" class="form-label">Name</label>
				<input type="text" class="form-control" id="name" name="name" aria-describedby="nameHelp">
			</div>
			<div class="mb-3">
				<label for="team" class="form-label">Team</label>
				<select class="form-select text-muted" id="team" name="team" aria-label="Team select example">
					<option selected disabled>Select team</option>
					<?php foreach( $data['teams'] as $team ) : ?>
					<option value="<?= $team; ?>" class="text-dark"><?= $team; ?></option>
					<?php endforeach ; ?>
				</select>
			</div>
			<div class="mb-3">
				<label for="position" class="form-label">Position</label>
				<select class="form-select text-muted" id="position" name="position" aria-label="Position select example">
					<option selected disabled>Select position</option>
					<?php foreach($data['positions'] as $position ) : ?>
					<option value="<?= $position; ?>" class="text-dark"><?= $position; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="mb-3">
				<label for="height" class="form-label">Height</label>
				<input type="number" class="form-control" id="height" name="height" aria-describedby="heightHelp">
			</div>
			<div class="mb-3">
				<label for="weight" class="form-label">Weight</label>
				<input type="number" class="form-control" id="weight" name="weight" aria-describedby="weightHelp">
			</div>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
			<button type="submit" class="btn btn-primary">Add Data</button>
			</form>
		</div>
		</div>
	</div>
	</div>
	
</div>