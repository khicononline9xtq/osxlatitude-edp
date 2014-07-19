<?php
		echo "<div id=\"tabs-1\">\n";
		echo "<span class='graytitle'>Kernel Extentions (kexts / drivers)</span>\n";
		echo "<ul class='pageitem'>";

		//
		// Show dropdown for FakeSMC kexts
		//
		$fakesmc = $edp_db->query("SELECT * FROM fakesmc");
		echo "<li class='select'><select name='fakesmc'>";
		
		foreach($fakesmc as $row) {
			$sel = ""; if ("$mdrow[fakesmc]" == "$row[id]") { $sel = "SELECTED"; }
			echo "<option value='$row[id]' $sel>&nbsp;FakeSMC: v$row[version] - $row[notes]</option>\n";
		}
		
		echo "</select><span class='arrow'></span> </li>";

				
		//
		// Show dropdown for PS2 kexts
		//
		$ps2 = $edp_db->query("SELECT * FROM ps2");
		echo "<li class='select'><select name='ps2pack'>";
		
		$using = "";
		foreach($ps2 as $row) {
			$sel =""; if ("$mdrow[ps2]" == "$row[id]") { $sel = "SELECTED"; $using = "yes"; }
			echo "<option value='$row[id]' $sel>&nbsp; PS2: $row[name] v$row[version] - $row[notes]</option>\n";
		}
		
		if ($using == "")
			echo "<option value='no' SELECTED>&nbsp; PS2: None selected</option>\n"; 
			
		echo "<option value='no'>&nbsp; PS2: Don't load</option>\n";
		echo "</select><span class='arrow'></span> </li>";
			
			
		//
		// Show dropdown for Audio kexts
		//			
		echo "<li class='select'>";
		echo "<select name='audiopack'>\n";		
		
		$using = "";
		// Check for AppleHDA		
		if ($mdrow[audio] == "builtin") {
			global $os;
			$applehda = $edp_db->query("SELECT * FROM applehda WHERE model_id = '$mdrow[id]'");
			switch ($os) {
				case "sl":    				
				case "lion":    				
				case "ml":    				
				case "mav":    				
				case "yos":
					foreach($applehda as $row) {
						if ($row[$os] != "no")
						$aID = explode(',', $row[$os]);
						
						if (getVersion() >= $aID[1]) {
							echo "<option value='builtin' SELECTED>&nbsp; Audio: Patched AppleHDA v$aID[0]</option>\n";
							$using = "yes";
						}
						else 
							echo "<option value='builtin' SELECTED>&nbsp; Audio: Patched AppleHDA v$aID[0] not supported in this OSX version, using latest VooodooHDA</option>\n";
					}
				break;
			}
		}
		// Check for VoodooDHA
		$voodoodHDA = $edp_db->query("SELECT * FROM audio");
		foreach($voodoodHDA as $row) {
			$sel = ""; 
			if ("$mdrow[audio]" == "$row[id]") { $sel = "SELECTED"; $using = "yes"; }
			echo "<option value='$row[id]' $sel>&nbsp; Audio: $row[name] v$row[version] - $row[notes]</option>\n";
		}	
		
		if ($using == "")
			echo "<option value='no' SELECTED>&nbsp; Audio: None selected</option>\n"; 
			
		echo "<option value='no'>&nbsp; Audio: Don't load</option>\n";			
		echo "</select><span class='arrow'></span> </li>\n";


		//
		// Show dropdown for Ethernet (lan) Kexts
		//
		$lan = $edp_db->query("SELECT * FROM ethernet");
		echo "<li class='select'><select name='ethernet'>\n";
		
		$using = "";
		foreach($lan as $row) {
			$sel = ""; if ("$mdrow[ethernet]" == "$row[id]") { $sel = "SELECTED"; $using = "yes"; }
			echo "<option value='$row[id]' $sel>&nbsp; Ethernet: $row[name] v$row[version] - $row[notes]</option>\n";
		}			
		
		if ($using == "")
			echo "<option value='no' SELECTED>&nbsp; Ethernet: None selected</option>\n";
		
		echo "<option value='no'>&nbsp; Ethernet: Don't load</option>\n";	
		echo "</select><span class='arrow'></span> </li>\n";
			

		//
		// Show dropdown for Wifi Kexts
		//
		$wifi = $edp_db->query("SELECT * FROM wifi");
		echo "<li class='select'><select name='wifipack'>\n";
		
		$using = "";
		foreach($wifi as $row) {
			$s=""; if ("$mdrow[wifi]" == "$row[id]") { $s = "SELECTED"; $using = "yes"; }
			echo "<option value='$row[id]' $s>&nbsp; WiFi: $row[name] - $row[notes]</option>\n";
		}
		
		if ($using == "")
			echo "<option value='no' SELECTED>&nbsp; WiFi: None selected</option>\n";
		
		echo "<option value='no'>&nbsp; WiFi: Don't load</option>\n";		
		echo "</select><span class='arrow'></span> </li>\n";
			

		//						
		// Show dropdown for Battery kexts
		//
		$bat = $edp_db->query("SELECT * FROM battery");
		echo "<li class='select'><select name='batterypack'>\n";
		
		$using = "";
		foreach($bat as $row) {
			$sel = ""; if ("$mdrow[battery]" == "$row[id]") { $sel = "SELECTED"; $using = "yes"; }
			echo "<option value='$row[id]' $sel>&nbsp; Battery: $row[name] v$row[version] </option>\n";
		}			
		
		if ($using == "")
			echo "<option value='no' SELECTED>&nbsp; Battery: None selected</option>\n";
		
		echo "<option value='no'>&nbsp; Battery: Don't load</option>\n";		
		echo "</select><span class='arrow'></span> </li>\n";
			
			
		echo "</ul><br></div>";
?> 
