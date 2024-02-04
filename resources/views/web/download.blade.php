<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Download</title>
</head>

<body>

</body>
<script>
	var isAndroid = /android/i.test(navigator.userAgent);
	var isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
	if (isAndroid) {
		window.location.href = 'https://play.google.com/store/apps/details?id=com.barangku.app&pcampaignid=web_share';
	} else if (isIOS) {
		window.location.href = 'https://apps.apple.com/id/app/barangku/id6467518158?l=id';
	} else {
		window.location.href = 'https://play.google.com/store/apps/details?id=com.barangku.app&pcampaignid=web_share';
	}
</script>

</html>
