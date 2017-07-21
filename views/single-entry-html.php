<?php

if (isset($userEntry) === false) {
	trigger_error('views/single-entry-html.php needs $userEntry');
}

$singleEntryHTML = "";

if (isset($_POST['edit'])) {
	if ($_POST['edit'] === "Save") {
		$singleEntryHTML = "<p>Log was saved</p>";
	} else if ($_POST['edit'] === "Delete") {
		$singleEntryHTML = "
		<p>Do you want to delete this log?</p>
		<form method='post' action='index.php?page=editor'>
			<input type='hidden' name='id' value='$userEntry->log_id'/>
			<input type='submit' name='edit' value='Confirm'/>
		</form>
		</br>
		";
	} else if ($_POST['edit'] === "Update") {
		$singleEntryHTML = "<p>Log was updated</p>";
	}
}

$singleEntryHTML .= "
<table>
<tr><td>Date:</td><td>$userEntry->date</td></tr>
<tr><td>Quest:</td><td id='select-quest'>$userEntry->quest</td></tr>
<tr><td>Deck Name:</td><td>$userEntry->deck_name</td><td>$userEntry->ringsdb</td></tr>
<tr><td>Mode:</td><td>$userEntry->mode</td></tr>
<tr><td>Player Count:</td><td>$userEntry->player_count</td></tr>
<tr><td>Result:</td><td>$userEntry->result</td></tr>
<tr><td>Score:</td><td>$userEntry->score</td></tr>
<tr><td>Round Count:</td><td>$userEntry->round_count</td></tr>
<tr><td>Ending Threat:</td><td>$userEntry->ending_threat</td></tr>
<tr><td>Comments:</td><td>$userEntry->comments</td></tr>
<tr><td>Favorite?:</td><td>$userEntry->favorite</td></tr>
<tr><td>Progression Style?:</td><td>$userEntry->progression</td></tr>
</table>
<div id='ptm'>
	<table>
	<tr><td>Which Stage 3 did you reveal?:</td>
	<td>$userEntry->ptm</td></tr></table>
</div>
<div id='efdg'>
	<table>
	<tr><td>Who was the captured hero?:</td>
	<td>$userEntry->efdg</td></tr></table>
</div>
<div id='ffm'>
	<table>
	<tr><td>Which quest card did you win by?:</td>
	<td>$userEntry->ffm</td></tr></table>
</div>
<div id='twitw'>
	<table>
	<tr><td>Win Condition:</td>
	<td>$userEntry->twitw</td></tr></table>
</div>
<div id='fos'>
	<table>
	<tr><td>Which Stage 4 did you get?:</td>
	<td>$userEntry->fos</td></tr></table>
</div>
<div id='ii'>
	<table>
	<tr><td>Which was your second stage?:</td>
	<td>$userEntry->ii</td></tr></table>
</div>
<div id='tsf'>
	<table>
	<tr><td>Plot:</td>
	<td>$userEntry->tsf1</td></tr>
	<tr><td>Villain:</td>
	<td>$userEntry->tsf2</td></tr></table>
</div>
<div id='eaad'>
	<table>
	<tr><td>Rescued Villagers:</td>
	<td>$userEntry->eaad1</td></tr>
	<tr><td>Dead Villagers:</td>
	<td>$userEntry->eaad2</td></tr></table>
</div>
<div id='aoo'>
	<table>
	<tr><td>Chosen Enemy:</td>
	<td>$userEntry->aoo1</td></tr>
	<tr><td>Chosen Location:</td>
	<td>$userEntry->aoo2</td></tr></table>
</div>
<div id='tfoi'>
	<table>
	<tr><td>Chosen Dunland Enemy Stage 1:</td>
	<td>$userEntry->tfoi1</td></tr>
	<tr><td>Chosen Dunland Enemy Stage 2:</td>
	<td>$userEntry->tfoi2</td></tr>
	<tr><td>Chosen Dunland Enemy Stage 3:</td>
	<td>$userEntry->tfoi3</td></tr></table>
</div>
<div id='tcao'>
	<table>
	<tr><td>Chosen Mountain Location:</td>
	<td>$userEntry->tcao</td></tr></table>
</div>
<div id='ifn'>
	<table>
	<tr><td>Chosen Huorn Enemy Stage 2:</td>
	<td>$userEntry->ifn</td></tr></table>
</div>
<div id='tdt'>
	<table>
	<tr><td>Chosen Boar Clan Enemy Stage 1:</td>
	<td>$userEntry->tdt1</td></tr>
	<tr><td>Chosen Boar Clan Enemy Stage 2:</td>
	<td>$userEntry->tdt2</td></tr></table>
</div>
<div id='ttt'>
	<table>
	<tr><td>First Trial:</td>
	<td>$userEntry->ttt1</td></tr>
	<tr><td>First Location:</td>
	<td>$userEntry->ttt2</td></tr>
	<tr><td>First Guardian:</td>
	<td>$userEntry->ttt3</td></tr>
	<tr><td>Second Trial:</td>
	<td>$userEntry->ttt4</td></tr>
	<tr><td>Second Location:</td>
	<td>$userEntry->ttt5</td></tr>
	<tr><td>Second Guardian:</td>
	<td>$userEntry->ttt6</td></tr>
	<tr><td>Third Trial:</td>
	<td>$userEntry->ttt7</td></tr>
	<tr><td>Third Location:</td>
	<td>$userEntry->ttt8</td></tr>
	<tr><td>Third Guardian:</td>
	<td>$userEntry->ttt9</td></tr></table>
</div>
<div id='tit'>
	<table>
	<tr><td>Ending Threat Elimination Level:</td>
	<td>$userEntry->tit</td></tr></table>
</div>
<div id='tnie'>
	<table>
	<tr><td>Chosen Location:</td>
	<td>$userEntry->tnie</td></tr></table>
</div>
<div id='cs'>
	<table>
	<tr><td>Chosen Ost-in-Edhil Location:</td>
	<td>$userEntry->cs</td></tr></table>
</div>
<div id='tac'>
	<table>
	<tr><td>Chosen Raven Enemy:</td>
	<td>$userEntry->tac</td></tr></table>
</div>
<div id='iic'>
	<table>
	<tr><td>Chosen Location:</td>
	<td>$userEntry->iic</td></tr></table>
</div>
<div id='efmg'>
	<table>
	<tr><td>Starter Hero:</td>
	<td>$userEntry->efmg</td></tr></table>
</div>
<div id='ate'>
	<table>
	<tr><td>Chosen Side-quest:</td>
	<td>$userEntry->ate1</td></tr>
	<tr><td>Chosen Location:</td>
	<td>$userEntry->ate2</td></tr></table>
</div>
<div id='vab'>
	<table>
	<tr><td>Chosen Ship:</td>
	<td>$userEntry->vab1</td></tr>
	<tr><td>Victoryndition:</td>
	<td>$userEntry->vab2</td></tr></table>
</div>
<div id='fots'>
	<table>
	<tr><td>Chosen Ship:</td>
	<td>$userEntry->fots1</td></tr>
	<tr><td>Winning Stage:</td>
	<td>$userEntry->fots2</td></tr>
	<tr><td>Win Condition:</td>
	<td>$userEntry->fots3</td></tr></table>
</div>
<div id='ttitd'>
	<table>
	<tr><td>Chosen Ship:</td>
	<td>$userEntry->ttitd1</td></tr>
	<tr><td>Loss by high ship location threat?:</td>
	<td>$userEntry->ttitd2</td></tr></table>
</div>
<div id='asoch'>
	<table>
	<tr><td>Chosen Ship:</td>
	<td>$userEntry->asoch1</td></tr>
	<tr><td>Win Condition:</td>
	<td>$userEntry->asoch2</td></tr>
	<tr><td>Chosen Ship Enemy:</td>
	<td>$userEntry->asoch3</td></tr>
	<tr><td>Second Chosen Ship Enemy (3-4 players):</td>
	<td>$userEntry->asoch4</td></tr></table>
</div>
<div id='tcoc'>
	<table>
	<tr><td>Placeholder for now:</td>
	<td>$userEntry->tcoc1</td></tr>
	<tr><td>Placeholder for now:</td>
	<td>$userEntry->tcoc1</td></tr></table>
</div>
<div id='efu'>
	<table>
	<tr><td>Chosen Location:</td>
	<td>$userEntry->efu</td></tr></table>
</div>
<div id='dc'>
	<table>
	<tr><td>Ending Temperature:</td>
	<td>$userEntry->dc</td></tr></table>
</div>
<div id='tlaom'>
	<table>
	<tr><td>Chosen Objective Hero:</td>
	<td>$userEntry->tlaom1</td></tr>
	<tr><td>First Rescued Hero:</td>
	<td>$userEntry->tlaom2</td></tr>
	<tr><td>Second Rescued Hero:</td>
	<td>$userEntry->tlaom3</td></tr>
	<tr><td>Third Rescued Hero:</td>
	<td>$userEntry->tlaom4</td></tr></table>
</div>
<div id='tm'>
	<table>
	<tr><td>Chosen Location:</td>
	<td>$userEntry->tm1</td></tr>
	<tr><td>Drawn Trap:</td>
	<td>$userEntry->tm2</td></tr></table>
</div>
<div id='rah'>
	<table>
	<tr><td>Chosen Location:</td>
	<td>$userEntry->rah1</td></tr>
	<tr><td>Loss by orcs catching up?:</td>
	<td>$userEntry->rah2</td></tr></table>
</div>
<div id='otmmg'>
	<table>
	<tr><td>Selected Treasure:</td>
	<td>$userEntry->otmmg</td></tr></table>
</div>
<div id='tbofa'>
	<table>
	<tr><td>First Cleared Stage:</td>
	<td>$userEntry->tbofa1</td></tr>
	<tr><td>Second Cleared Stage:</td>
	<td>$userEntry->tbofa2</td></tr>
	<tr><td>Third Cleared Stage:</td>
	<td>$userEntry->tbofa3</td></tr></table>
</div>
<div id='fttf'>
	<table>
	<tr><td>Ending Ring-bearer Life:</td>
	<td>$userEntry->fttf</td></tr></table>
</div>
<div id='trgs'>
	<table>
	<tr><td>Elrond's Council Choice:</td>
	<td>$userEntry->trgs1</td></tr>
	<tr><td>Beginning Choice:</td>
	<td>$userEntry->trgs2</td></tr></table>
</div>
<div id='jitd'>
	<table>
	<tr><td>Chosen Location:</td>
	<td>$userEntry->jitd1</td></tr>
	<tr><td>Ending Doom, Doom, Doom Tokens:</td>
	<td>$userEntry->jitd2</td></tr>
	<tr><td>Hero discarded to The Great Bridge:</td>
	<td>$userEntry->jitd3</td></tr></table>
</div>
<div id='botf'>
	<table>
	<tr><td>Chosen Stage 3:</td>
	<td>$userEntry->botf</td></tr></table>
</div>
<div id='tuh'>
	<table>
	<tr><td>Chosen Captive Hero:</td>
	<td>$userEntry->tuh1</td></tr>
	<tr><td>Ending Pursuit Value:</td>
	<td>$userEntry->tuh2</td></tr>
	<tr><td>Chosen Uruk-hai Enemy:</td>
	<td>$userEntry->tuh3</td></tr></table>
</div>
<div id='hd'>
	<table>
	<tr><td>Stage 1 Choice:</td>
	<td>$userEntry->hd1</td></tr>
	<tr><td>The Wall is Breached! explored?:</td>
	<td>$userEntry->hd2</td></tr></table>
</div>
<div id='trti'>
	<table>
	<tr><td># of Objective Ents in play:</td>
	<td>$userEntry->trti1</td></tr>
	<tr><td>Loss due to 0 cards in hand?:</td>
	<td>$userEntry->trti2</td></tr></table>
</div>
<div id='tpotm'>
	<table>
	<tr><td>Chosen Location:</td>
	<td>$userEntry->tpotm1</td></tr>
	<tr><td>Chosen Undead Enemy:</td>
	<td>$userEntry->tpotm2</td></tr></table>
</div>
<div id='jttcr'>
	<table>
	<tr><td>Chosen Location (2+ players):</td>
	<td>$userEntry->jttcr</td></tr></table>
</div>
<div id='tpotgc'>
	<table>
	<tr><td># of Extra Resources:</td>
	<td>$userEntry->tpotgc1</td></tr>
	<tr><td>Chosen Location:</td>
	<td>$userEntry->tpotgc2</td></tr>
	<tr><td>Remove Overcome by Fear by raising threat?:</td>
	<td>$userEntry->tpotgc3</td></tr></table>
</div>
<div id='tsog'>
	<table>
	<tr><td>Chosen Ship Location:</td>
	<td>$userEntry->tsog</td></tr></table>
</div>
<div id='tbopf'>
	<table>
	<tr><td>Chosen Enemy:</td>
	<td>$userEntry->tbopf</td></tr></table>
</div>
<div id='tmao'>
	<table>
	<tr><td>First Chosen Scout Enemy:</td>
	<td>$userEntry->tmao1</td></tr>
	<tr><td>Second Chosen Scout Enemy:</td>
	<td>$userEntry->tmao2</td></tr>
	<tr><td>Third Chosen Scout Enemy:</td>
	<td>$userEntry->tmao3</td></tr>
	<tr><td>Fourth Chosen Scout Enemy:</td>
	<td>$userEntry->tmao4</td></tr>
	<tr><td>Fifth Chosen Scout Enemy:</td>
	<td>$userEntry->tmao5</td></tr>
	<tr><td>Sixth Chosen Scout Enemy:</td>
	<td>$userEntry->tmao6</td></tr>
	<tr><td>Seventh Chosen Scout Enemy:</td>
	<td>$userEntry->tmao7</td></tr>
	<tr><td>Eighth Chosen Scout Enemy:</td>
	<td>$userEntry->tmao8</td></tr>
	<tr><td>Ninth Chosen Scout Enemy:</td>
	<td>$userEntry->tmao9</td></tr></table>
</div>
<div id='tbol'>
	<table>
	<tr><td>Ending Damage on Lake-town:</td>
	<td>$userEntry->tbol</td></tr></table>
</div>
<div id='tof'>
	<table>
	<tr><td>Starting Location:</td>
	<td>$userEntry->tof</td></tr></table>
</div>
<div id='matpp'>
	<table>
	<tr><td>Chosen Brigand Enemy (2+ players):</td>
	<td>$userEntry->matpp1</td></tr>
	<tr><td>Suspect:</td>
	<td>$userEntry->matpp2</td></tr>
	<tr><td>Hideout:</td>
	<td>$userEntry->matpp3</td></tr></table>
</div>
</br>
<form method='post' action='index.php?page=editor'>
	<input type='hidden' name='id' value='$userEntry->log_id'/>
	<input type='submit' name='edit' value='Edit'/>
	<input type='submit' name='edit' value='Delete'/>
</form>
</br>
</br>
";
return $singleEntryHTML;

?>