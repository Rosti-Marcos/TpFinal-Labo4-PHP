<?php 
 include('header.php');
 include('nav-bar.php');
?>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Reservation List</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table table-striped">
						  <thead>
						    <tr>
						      <th style="text-align: center;">Keeper</th>
						      <th style="text-align: center;">Start date</th>
						      <th style="text-align: center;">End date</th>
						      <th style="text-align: center;">Price</th>
						      <th style="text-align: center;">Status</th>
							  <th style="text-align: center;">Message</th>
						    </tr>
						  </thead>
						  <tbody>
						  <?php
							foreach($bookingList as $booking)
							{
                                $name;
                                $lastName;
                                foreach($userList as $user){
                                    if($booking->getKeeper()->getKeeperId() == $user->getUserId()){
                                        $name = $user->getName();
                                        $lastName = $user->getLastname();
                                    }
                                }
								?>
								<tr>
									<td style="text-align: center;"><?php echo $name." ".$lastName ?></td>
									<td style="text-align: center;"><?php echo $booking->getStartDate() ?></td>
									<td style="text-align: center;"><?php echo $booking->getEndDate() ?></td>
									<td style="text-align: center;"><?php echo $booking->getPrice() ?></td>
									<?php
										$class = "";
										switch ($booking->getStatus()) {
											case 'approved':
												$class = "btn btn-success";
												break;
											case 'pending':
												$class =  "btn btn-warning";
												break;
											case 'rejected':
												$class =  "btn btn-danger"; 
												break;

										}
									?>
									<td style="text-align: center;">
										<a class="<?php echo $class?>"><?php echo $booking->getStatus() ?></a>
									</td>
									<td style="text-align: center;"><?php echo $booking->getMessage() ?></td>
	
								</tr>
								<?php
							}
							?> 
						  </tbody>
						</table>
					</div>
				</div>
			  </form>
			</div>
		</div>
		<a href="<?php echo FRONT_ROOT. "Home\ShowWellcomeView"?>">Back</a>
	</section>

	<?php 
 include('footer.php');
?>