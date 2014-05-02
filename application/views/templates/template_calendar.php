{table_open}<table class="calendar" border="0" cellpadding="0" cellspacing="0">{/table_open}
	{heading_row_start}<tr>{/heading_row_start}
	{heading_previous_cell}
		<th class="left-th">
			<a class="pull-left" href="<?php echo base_url() ?>calendar/{previous_url}">&lt;&lt;</a>
		</th>
	{/heading_previous_cell}
	{heading_title_cell}
		<th colspan="{colspan}" class="title">{heading}</th>
	{/heading_title_cell}
	{heading_next_cell}
		<th class="right-th">
			<a class="pull-right" href="<?php echo base_url() ?>calendar/{next_url}">&gt;&gt;</a>
		</th>
	{/heading_next_cell}
	{heading_row_end}</tr>{/heading_row_end}
	{week_row_start}<tr>{/week_row_start}
	{week_day_cell}
		<th class="red">{week_day}</th>
	{/week_day_cell}
	{week_row_end}</tr>{/week_row_end}
	{cal_row_start}<tr>{/cal_row_start}
	{cal_cell_start}<td>{/cal_cell_start}
	{cal_cell_content}
		<div>
			<div class="day">
				<strong>{day}</strong>
			</div>
			<div class="content">{content}</div>
		</div>
	{/cal_cell_content}
	{cal_cell_content_today}
		<div>
			<div class="day">
				<div class="highlight">
					<strong>{day}</strong>
				</div>
			</div>
			<div class="content">{content}</div>
		</div>
	{/cal_cell_content_today}
	{cal_cell_no_content}
		<div>
			<div class="day">{day}</div>
		</div>
	{/cal_cell_no_content}
	{cal_cell_no_content_today}
		<div>
			<div class="day">
				<div class="highlight">{day}</div>
			</div>
		</div>
	{/cal_cell_no_content_today}
	{cal_cell_blank}&nbsp;{/cal_cell_blank}
	{cal_cell_end}</td>{/cal_cell_end}
	{cal_row_end}</tr>{/cal_row_end}
{table_close}</table>{/table_close}
