var newQuest;
var oldQuest;

$(document).ready(function() {
	//$('#quest-label').css('color', 'red');
	oldQuest = abbreviate($('#select-quest').html());
	if (oldQuest != "") {
		$(oldQuest).show();
	}
	oldQuest = abbreviate($('#select-quest').val());
	if (oldQuest != "") {
		$(oldQuest).show();
	}
});

function abbreviate(questName) {
	switch(questName) {
		case "Passage Through Mirkwood":
			return "#ptm";
		case "Journey Along the Anduin":
			return "#jata";
		case "Escape from Dol Guldur":
			return "#efdg";
		case "The Hunt for Gollum":
			return "#thfg";
		case "Conflict at the Carrock":
			return "#catc";
		case "Flight from Moria":
			return "#ffm";			
		case "The Watcher in the Water":
			return "#twitw";			
		case "Foundations of Stone":
			return "#fos";			
		case "Into Ithilien":
			return "#ii";			
		case "The Steward's Fear":
			return "#tsf";			
		case "Encounter at Amon Dîn":
			return "#eaad";			
		case "Assault on Osgiliath":
			return "#aoo";			
		case "The Fords of Isen":
			return "#tfoi";			
		case "To Catch an Orc":
			return "#tcao";			
		case "Into Fangorn":
			return "#ifn";			
		case "The Dunland Trap":
			return "#tdt";			
		case "The Three Trials":
			return "#ttt";			
		case "Trouble in Tharbad":
			return "#tit";			
		case "Nîn-in-Eilph":
			return "#tnie";			
		case "Celebrimbor's Secret":
			return "#cs";			
		case "The Antlered Crown":
			return "#tac";			
		case "Intruders in Chetwood":
			return "#iic";			
		case "Escape from Mount Gram":
			return "#efmg";			
		case "Across the Ettenmoors":
			return "#ate";			
		case "Voyage Across Belegaer":
			return "#vab";			
		case "Flight of the Stormcaller":
			return "#fots";			
		case "The Thing in the Depths":
			return "#ttitd";			
		case "A Storm on Cobas Haven":
			return "#asoch";			
		case "City of Corsairs":
			return "#tcoc";			
		case "Escape from Umbar":
			return "#efu";			
		case "Desert Crossing":
			return "#dc";			
		case "The Long Arm of Mordor":
			return "#tlaom";			
		case "The Mûmakil":
			return "#tm";			
		case "Race Across Harad":
			return "#rah";			
		case "Over the Misty Mountains Grim":
			return "#otmmg";			
		case "The Battle of Five Armies":
			return "#tbofa";			
		case "Flight to the Ford":
			return "#fttf";			
		case "The Ring Goes South":
			return "#trgs";			
		case "Journey in the Dark":
			return "#jitd";			
		case "Breaking of the Fellowship":
			return "#botf";			
		case "The Uruk-hai":
			return "#tuh";			
		case "Helm's Deep":
			return "#hd";			
		case "The Road to Isengard":
			return "#trti";			
		case "The Passage of the Marshes":
			return "#tpotm";			
		case "Journey to the Cross-roads":
			return "#jttcr";			
		case "The Passing of the Grey Company":
			return "#tpotgc";			
		case "The Siege of Gondor":
			return "#tsog";			
		case "The Battle of Pelennor Fields":
			return "#tbopf";			
		case "The Massing at Osgiliath":
			return "#tmao";			
		case "The Battle of Lake-town":
			return "#tbol";			
		case "The Old Forest":
			return "#tof";			
		case "Murder at the Prancing Pony":
			return "#matpp";			
		default:
			return "";
	}
}

$('#select-quest').change(function() {
	$(oldQuest).hide();
	newQuest = $('#select-quest').val();
	oldQuest = abbreviate(newQuest);
	$(oldQuest).show();
});