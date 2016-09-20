<!DOCTYPE html>
<html>
<?php include '../head.inc.php' ?>
<body class="content-page">
<div id="body">
	<?php include '../nav.inc.php' ?>
	<div class="block t-gutter-xx-lg">
		<h2>The Clymb</h2>
		<div class="t-gutter-x-lg">
			<a href="/" id="test-request" class="btn">Request a Test</a>
		</div>
		<script type="text/javascript" src="https://teamroboboogie.atlassian.net/s/e3e9e7d3b6bcb8b82dbfe2b1f4a0e1d5-T/en_US-wyag3q/6327/26/1.4.13/_/download/batch/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector/com.atlassian.jira.collector.plugin.jira-issue-collector-plugin:issuecollector.js?locale=en-US&collectorId=70e17605"></script>
		<script type="text/javascript">
			window.ATL_JQ_PAGE_PROPS =  {
				"triggerFunction": function(showCollectorDialog) {
					//Requries that jQuery is available!
					jQuery("#test-request").click(function(e) {
						e.preventDefault();
						showCollectorDialog();
					});
				}};
		</script>
	</div>
	<?php include '../footer.inc.php' ?>
</div>
<?php include '../script.inc.php' ?>
</body>
</html>