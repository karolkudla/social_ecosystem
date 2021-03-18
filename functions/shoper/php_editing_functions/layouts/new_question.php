<div class="qa_wrapper" id="x">

	<div class="counter"></div>

	<div style="display: grid;">
		<label class="inp">
			<input type="text" placeholder="&nbsp;" class="q">
			<span class="label">Nazwa dopłaty / rabatu</span>
			<span class="border"></span>
		</label>
	</div>
	
	<div class="moro">
		<div class="moro_info">
			Czy kupujący będzie mógł zaznaczyć wiele dopłat/rabatów czy tylko jeden ?
		</div>
		<div class="moro_radio_wrapper" style="display: flex; align-items: center;">
			<label><input class="moro_radio" type="radio" name="x" value="multi_ans">Wiele odpowiedzi</input></label>
			<label><input class="moro_radio" type="radio" name="x" value="one_ans">Jedna odpowiedź</input></label>
		</div>
	</div>
	
	<div class="ans_wrapper">
		<div class="answer">
				<div class="ans_a">
					<div style="display: grid;">
						<label class="inp">
							<input type="text" placeholder="&nbsp;" class="a">
							<span class="label">Opcja dopłaty / rabatu</span>
							<span class="border"></span>
						</label>
					</div>
				</div>
			
			<div class="dor_radio_wrapper" choice="x">
				<label><input class="dor_radio" type="radio" name="x" value="no_change" checked>Cena bez zmian</input></label>
				<label><input class="dor_radio" type="radio" name="x" value="doplaty">Dopłata</input></label>
				<label><input class="dor_radio" type="radio" name="x" value="rabaty">Rabat</input></label>
			</div>
			
			<div class="dop_or_rab">
			</div>	
		</div>
	</div>
	
	<div style="display: flex; justify-content: center;">
		<div class="add_new_ans"><span class="icon-plus"></span>&nbsp Dodaj nową odpowiedź</div>
		<div class="del_new_ans"><span class="icon-minus"></span>&nbsp Usuń ostatnią odpowiedź</div>
	</div>
	
</div>