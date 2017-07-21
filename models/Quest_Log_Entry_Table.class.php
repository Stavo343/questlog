<?php

include_once "models/Table.class.php";

class Quest_Log_Entry_Table extends Table {
	
	public function getUserEntries($userId) {
		$sql = "SELECT log_id, date, quest FROM quest_log WHERE user_id = ? ORDER BY date DESC";
		$data = array($userId);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
	
	public function getUserEntry($id) {
		$sql = "SELECT log_id, date, quest, deck_name, ringsdb, mode, player_count, result, score, round_count, ending_threat, comments, favorite, progression, ptm, efdg, ffm, twitw, fos, ii, tsf1, tsf2, eaad1, eaad2, aoo1, aoo2, tfoi1, tfoi2, tfoi3, tcao, ifn, tdt1, tdt2, ttt1, ttt2, ttt3, ttt4, ttt5, ttt6, ttt7, ttt8, ttt9, tit, tnie, cs, tac, iic, efmg, ate1, ate2, vab1, vab2, fots1, fots2, fots3, ttitd1, ttitd2, asoch1, asoch2, asoch3, asoch4, tcoc1, tcoc2, efu, dc, tlaom1, tlaom2, tlaom3, tlaom4, tm1, tm2, rah1, rah2, otmmg, tbofa1, tbofa2, tbofa3, fttf, trgs1, trgs2, jitd1, jitd2, jitd3, botf, tuh1, tuh2, tuh3, hd1, hd2, trti1, trti2, tpotm1, tpotm2, jttcr, tpotgc1, tpotgc2, tpotgc3, tsog, tbopf, tmao1, tmao2, tmao3, tmao4, tmao5, tmao6, tmao7, tmao8, tmao9, tbol, tof, matpp1, matpp2, matpp3 FROM quest_log WHERE log_id = ?";
		$data = array($id);
		$statement = $this->makeStatement($sql, $data);
		$model = $statement->fetchObject();
		return $model;
	}
	
	public function saveEntry($user_id, $date, $quest, $deck_name, $ringsdb, $mode, $player_count, $result, $score, $round_count, $ending_threat, $comments, $favorite, $progression, $ptm, $efdg, $ffm, $twitw, $fos, $ii, $tsf1, $tsf2, $eaad1, $eaad2, $aoo1, $aoo2, $tfoi1, $tfoi2, $tfoi3, $tcao, $ifn, $tdt1, $tdt2, $ttt1, $ttt2, $ttt3, $ttt4, $ttt5, $ttt6, $ttt7, $ttt8, $ttt9, $tit, $tnie, $cs, $tac, $iic, $efmg, $ate1, $ate2, $vab1, $vab2, $fots1, $fots2, $fots3, $ttitd1, $ttitd2, $asoch1, $asoch2, $asoch3, $asoch4, $tcoc1, $tcoc2, $efu, $dc, $tlaom1, $tlaom2, $tlaom3, $tlaom4, $tm1, $tm2, $rah1, $rah2, $otmmg, $tbofa1, $tbofa2, $tbofa3, $fttf, $trgs1, $trgs2, $jitd1, $jitd2, $jitd3, $botf, $tuh1, $tuh2, $tuh3, $hd1, $hd2, $trti1, $trti2, $tpotm1, $tpotm2, $jttcr, $tpotgc1, $tpotgc2, $tpotgc3, $tsog, $tbopf, $tmao1, $tmao2, $tmao3, $tmao4, $tmao5, $tmao6, $tmao7, $tmao8, $tmao9, $tbol, $tof, $matpp1, $matpp2, $matpp3) {
		$entrySQL = "INSERT INTO quest_log (user_id, date, quest, deck_name, ringsdb, mode, player_count, result, score, round_count, ending_threat, comments, favorite, progression, ptm, efdg, ffm, twitw, fos, ii, tsf1, tsf2, eaad1, eaad2, aoo1, aoo2, tfoi1, tfoi2, tfoi3, tcao, ifn, tdt1, tdt2, ttt1, ttt2, ttt3, ttt4, ttt5, ttt6, ttt7, ttt8, ttt9, tit, tnie, cs, tac, iic, efmg, ate1, ate2, vab1, vab2, fots1, fots2, fots3, ttitd1, ttitd2, asoch1, asoch2, asoch3, asoch4, tcoc1, tcoc2, efu, dc, tlaom1, tlaom2, tlaom3, tlaom4, tm1, tm2, rah1, rah2, otmmg, tbofa1, tbofa2, tbofa3, fttf, trgs1, trgs2, jitd1, jitd2, jitd3, botf, tuh1, tuh2, tuh3, hd1, hd2, trti1, trti2, tpotm1, tpotm2, jttcr, tpotgc1, tpotgc2, tpotgc3, tsog, tbopf, tmao1, tmao2, tmao3, tmao4, tmao5, tmao6, tmao7, tmao8, tmao9, tbol, tof, matpp1, matpp2, matpp3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
		$formData = array($user_id, $date, $quest, $deck_name, $ringsdb, $mode, $player_count, $result, $score, $round_count, $ending_threat, $comments, $favorite, $progression, $ptm, $efdg, $ffm, $twitw, $fos, $ii, $tsf1, $tsf2, $eaad1, $eaad2, $aoo1, $aoo2, $tfoi1, $tfoi2, $tfoi3, $tcao, $ifn, $tdt1, $tdt2, $ttt1, $ttt2, $ttt3, $ttt4, $ttt5, $ttt6, $ttt7, $ttt8, $ttt9, $tit, $tnie, $cs, $tac, $iic, $efmg, $ate1, $ate2, $vab1, $vab2, $fots1, $fots2, $fots3, $ttitd1, $ttitd2, $asoch1, $asoch2, $asoch3, $asoch4, $tcoc1, $tcoc2, $efu, $dc, $tlaom1, $tlaom2, $tlaom3, $tlaom4, $tm1, $tm2, $rah1, $rah2, $otmmg, $tbofa1, $tbofa2, $tbofa3, $fttf, $trgs1, $trgs2, $jitd1, $jitd2, $jitd3, $botf, $tuh1, $tuh2, $tuh3, $hd1, $hd2, $trti1, $trti2, $tpotm1, $tpotm2, $jttcr, $tpotgc1, $tpotgc2, $tpotgc3, $tsog, $tbopf, $tmao1, $tmao2, $tmao3, $tmao4, $tmao5, $tmao6, $tmao7, $tmao8, $tmao9, $tbol, $tof, $matpp1, $matpp2, $matpp3);
		$entryStatement = $this->makeStatement($entrySQL, $formData);
		return $this->db->lastInsertId();
	}
	
	public function updateEntry($date, $quest, $deck_name, $ringsdb, $mode, $player_count, $result, $score, $round_count, $ending_threat, $comments, $favorite, $progression, $ptm, $efdg, $ffm, $twitw, $fos, $ii, $tsf1, $tsf2, $eaad1, $eaad2, $aoo1, $aoo2, $tfoi1, $tfoi2, $tfoi3, $tcao, $ifn, $tdt1, $tdt2, $ttt1, $ttt2, $ttt3, $ttt4, $ttt5, $ttt6, $ttt7, $ttt8, $ttt9, $tit, $tnie, $cs, $tac, $iic, $efmg, $ate1, $ate2, $vab1, $vab2, $fots1, $fots2, $fots3, $ttitd1, $ttitd2, $asoch1, $asoch2, $asoch3, $asoch4, $tcoc1, $tcoc2, $efu, $dc, $tlaom1, $tlaom2, $tlaom3, $tlaom4, $tm1, $tm2, $rah1, $rah2, $otmmg, $tbofa1, $tbofa2, $tbofa3, $fttf, $trgs1, $trgs2, $jitd1, $jitd2, $jitd3, $botf, $tuh1, $tuh2, $tuh3, $hd1, $hd2, $trti1, $trti2, $tpotm1, $tpotm2, $jttcr, $tpotgc1, $tpotgc2, $tpotgc3, $tsog, $tbopf, $tmao1, $tmao2, $tmao3, $tmao4, $tmao5, $tmao6, $tmao7, $tmao8, $tmao9, $tbol, $tof, $matpp1, $matpp2, $matpp3, $log_id) {
		$sql = "UPDATE quest_log SET date = ?, quest = ?, deck_name = ?, ringsdb = ?, mode = ?, player_count = ?, result = ?, score = ?, round_count = ?, ending_threat = ?, comments = ?, favorite  = ?, progression = ?, ptm = ?, efdg = ?, ffm = ?, twitw = ?, fos = ?, ii = ?, tsf1 = ?, tsf2 = ?, eaad1 = ?, eaad2 = ?, aoo1 = ?, aoo2 = ?, tfoi1 = ?, tfoi2 = ?, tfoi3 = ?, tcao = ?, ifn = ?, tdt1 = ?, tdt2 = ?, ttt1 = ?, ttt2 = ?, ttt3 = ?, ttt4 = ?, ttt5 = ?, ttt6 = ?, ttt7 = ?, ttt8 = ?, ttt9 = ?, tit = ?, tnie = ?, cs = ?, tac = ?, iic = ?, efmg = ?, ate1 = ?, ate2 = ?, vab1 = ?, vab2 = ?, fots1 = ?, fots2 = ?, fots3 = ?, ttitd1 = ?, ttitd2 = ?, asoch1 = ?, asoch2 = ?, asoch3 = ?, asoch4 = ?, tcoc1 = ?, tcoc2 = ?, efu = ?, dc = ?, tlaom1 = ?, tlaom2 = ?, tlaom3 = ?, tlaom4 = ?, tm1 = ?, tm2 = ?, rah1 = ?, rah2 = ?, otmmg = ?, tbofa1 = ?, tbofa2 = ?, tbofa3 = ?, fttf = ?, trgs1 = ?, trgs2 = ?, jitd1 = ?, jitd2 = ?, jitd3 = ?, botf = ?, tuh1 = ?, tuh2 = ?, tuh3 = ?, hd1 = ?, hd2 = ?, trti1 = ?, trti2 = ?, tpotm1 = ?, tpotm2 = ?, jttcr = ?, tpotgc1 = ?, tpotgc2 = ?, tpotgc3 = ?, tsog = ?, tbopf = ?, tmao1 = ?, tmao2 = ?, tmao3 = ?, tmao4 = ?, tmao5 = ?, tmao6 = ?, tmao7 = ?, tmao8 = ?, tmao9 = ?, tbol = ?, tof = ?, matpp1 = ?, matpp2 = ?, matpp3 = ? WHERE log_id = ?";
		$data = array($date, $quest, $deck_name, $ringsdb, $mode, $player_count, $result, $score, $round_count, $ending_threat, $comments, $favorite, $progression, $ptm, $efdg, $ffm, $twitw, $fos, $ii, $tsf1, $tsf2, $eaad1, $eaad2, $aoo1, $aoo2, $tfoi1, $tfoi2, $tfoi3, $tcao, $ifn, $tdt1, $tdt2, $ttt1, $ttt2, $ttt3, $ttt4, $ttt5, $ttt6, $ttt7, $ttt8, $ttt9, $tit, $tnie, $cs, $tac, $iic, $efmg, $ate1, $ate2, $vab1, $vab2, $fots1, $fots2, $fots3, $ttitd1, $ttitd2, $asoch1, $asoch2, $asoch3, $asoch4, $tcoc1, $tcoc2, $efu, $dc, $tlaom1, $tlaom2, $tlaom3, $tlaom4, $tm1, $tm2, $rah1, $rah2, $otmmg, $tbofa1, $tbofa2, $tbofa3, $fttf, $trgs1, $trgs2, $jitd1, $jitd2, $jitd3, $botf, $tuh1, $tuh2, $tuh3, $hd1, $hd2, $trti1, $trti2, $tpotm1, $tpotm2, $jttcr, $tpotgc1, $tpotgc2, $tpotgc3, $tsog, $tbopf, $tmao1, $tmao2, $tmao3, $tmao4, $tmao5, $tmao6, $tmao7, $tmao8, $tmao9, $tbol, $tof, $matpp1, $matpp2, $matpp3, $log_id);
		$statement = $this->makeStatement($sql, $data);
		return $statement;
	}
	
	public function deleteEntry($id) {
		//$this->deleteLogsById($id);
		$sql = "DELETE FROM quest_log WHERE log_id = ?";
		$data = array($id);
		$statement = $this->makeStatement($sql, $data);
	}
}

?>