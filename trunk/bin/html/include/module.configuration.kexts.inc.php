<?php
		echo "<div id=\"tabs-1\">\n";
		echo "<span class='graytitle'>Kernel Extentions (kexts / drivers)</span>\n";
		echo "<ul class='pageitem'>";

		//Show dropdown for FakeSMC kexts
			$result = $edp_db->query("SELECT * FROM fakesmc");
			echo "<li class='select'><select name='fakesmc'>";
			foreach($result as $row) {
				$s=""; if ("$mdrow[fakesmc]" == "$row[id]") { $s = "SELECTED"; }
				echo "<option value='$row[id]' $s>&nbsp; FakeSMC: $row[name] ($row[notes])</option>\n";
		    }
			echo "</select><span class='arrow'></span> </li>";

				
		//Show dropdown for PS2 kexts
			$result = $edp_db->query("SELECT * FROM ps2New");
			echo "<li class='select'><select name='ps2pack'>";
			if ("$mdrow[ps2pack]" == "" || "$mdrow[ps2pack]" == "no") { echo "<option value='no' SELECTED>&nbsp; PS2 kext: None selected</option>\n"; }
			else { echo "<option value='no'>&nbsp; PS2 kext: None selected</option>\n"; }
			foreach($result as $row) {
				$s=""; if ("$mdrow[ps2pack]" == "$row[id]") { $s = "SELECTED"; }
				echo "<option value='$row[id]' $s>&nbsp; PS2 kext: $row[name] - $row[notes]</option>\n";
		    }
			echo "</select><span class='arrow'></span> </li>";
			
			
			
		//Show dropdown for Audio kexts
			global $os;
			$result = $edp_db->query("SELECT * FROM audio");
			echo "<li class='select'>";
			echo "<select name='audiopack'>\n";	

			foreach($result as $row) {
				$s=""; if ("$mdrow[audiopack]" == "$row[id]") { $s = "SELECTED"; }
				//echo "<option value='$row[id]' $s>&nbsp; Audio: $row[name] ($row[arch]) - $row[notes]</option>\n";
				echo "<option value='$row[id]' $s>&nbsp; Audio: $row[name] - $row[notes]</option>\n";
			}			
			// If AppleHDA folder found then set the value to builtin
			if (is_dir("/Extra/EDP/model-data/$mdrow[name]/common/applehda") || is_dir("/Extra/EDP/model-data/$mdrow[name]/$os/applehda")) { 
				echo "<option value='builtin' SELECTED>&nbsp; Audio: Patched AppleHDA</option>\n";
			} else {
				//Check if the field bundledAudio is set to yes, if so we will disable the dropdown field
				if ("$mdrow[audiopack]" == "" || "$mdrow[audiopack]" == "no") { echo "<option value='no' SELECTED>&nbsp; Audio: Not selected</option>"; }
			}
			echo "<option value='no'>&nbsp; Audio: Don't load</option>\n";			
			echo "</select><span class='arrow'></span> </li>\n";



		//Show dropdown for Ethernet (lan) Kexts
			$result = $edp_db->query("SELECT * FROM ethernet");
			echo "<li class='select'><select name='ethernet'>\n";
			if ("$mdrow[ethernet]" == "" || "$mdrow[ethernet]" == "no") { echo "<option value='no' SELECTED>&nbsp; Ethernet kext: Not selected</option>"; }
			else { echo "<option value='no'>&nbsp; Ethernet kext: Don't load</option>\n"; }
			foreach($result as $row) {
				$s=""; if ("$mdrow[ethernet]" == "$row[id]") { $s = "SELECTED"; }
				echo "<option value='$row[id]' $s>&nbsp; Ethernet kext: $row[name] - $row[notes]</option>\n";
		    }			
			echo "</select><span class='arrow'></span> </li>\n";
			

			
		//Show dropdown for Wifi Kexts
			$result = $edp_db->query("SELECT * FROM wifi");
			echo "<li class='select'><select name='wifikext'>\n";
			if ("$mdrow[wifikext]" == "" || "$mdrow[wifikext]" == "no") { echo "<option value='no' SELECTED>&nbsp; Wifi kext: Not selected</option>\n"; }			
			else { echo "<option value='no'>&nbsp; Wifi kext: Don't load</option>\n"; }
			foreach($result as $row) {
				$s=""; if ("$mdrow[wifikext]" == "$row[id]") { $s = "SELECTED"; }
				echo "<option value='$row[id]' $s>&nbsp; Wifi kext: $row[name] - $row[notes]</option>\n";
		    }
			echo "</select><span class='arrow'></span> </li>\n";
			

									
		//Show dropdown for Battery kexts
			$result = $edp_db->query("SELECT * FROM battery");
			echo "<li class='select'><select name='batteryKext'>\n";
			if ("$mdrow[batteryKext]" == "" || "$mdrow[batteryKext]" == "no") { echo "<option value='no' SELECTED>&nbsp; Battery kext: Not selected</option>\n"; }
			else { echo "<option value='no'>&nbsp; Battery kext: Don't load</option>\n"; }	
			foreach($result as $row) {
				$s=""; if ("$mdrow[batteryKext]" == "$row[id]") { $s = "SELECTED"; }
				echo "<option value='$row[id]' $s>&nbsp; Battery kext: $row[name] </option>\n";
		    }			
			echo "</select><span class='arrow'></span> </li>\n";
			
			
		echo "</ul><br></div>";
?> 
