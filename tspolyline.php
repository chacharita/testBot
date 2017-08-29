<?php

$string = "gkesAsw%7EdRXEp%40EHFJl%40%60DA%3Fl%40DH%3FTh%40XvLoWv%40eBrAoCvDqIpOi%5CfFoL%7CEkKiGUDaAkFYeKKYjHGP_%40RvAh%40%60QdG%7CBp%40rAZvAVxARlHp%40rCPjBHxZjBtUhA%7CCTzBXd%40Jl%40XVPbBtBt%40r%40bEpEdAfAbBxAn%60%40dZpQxMnDnCj%40%5EhBv%40%7C%40Xv%40N%60CVbBAbAI%7C%40Mz%40SdBk%40nBaAv%40g%40%7C%40o%40zAuAbBkBnAiBpA_CtJeS%7E%40gB%7C%40wAfAyAn%40k%40l%40g%40lBiAhAe%40x%40UfB%5D%60AiD%7EAaElAiCxEgIdAaBnDoEf%40w%40dKiQt%40aBRm%40T%7D%40PeAJeA%7E%40%7DPtBg%60%40Bo%40%3FkBIyASmBuIwp%40a%40eDGgACcA%3FoAFwAp%40kGfDqXt%40cHpBcQdIko%40x%40mFhEoTXoBVoCzAwe%40%60%40gKVmDjFun%40j%40eJdB%7BZ%7CA_%5CfEuv%40t%40iQNuAl%40iKbCud%40vAqYR_EXaEdCkd%40nFkcANmDd%40yHJ%7DCDyCe%40ia%40%3FaPWgYIcNMwKKsLOcUG%7BCQkBUwA_Isf%40OqACg%40CcAEkHQ_JMqEQqICcd%40QwUSqQIcCoB%7B%5DyFsgAMaD%40mDHkBJyAb%40cDb%40wBv%40sCj%40%7BAnAkCfAiBt%40eApA%7BAtBsBbAw%40jCeBjAm%40hAg%40nFyBv%7DBc%7D%40hLuEdvA%7Bi%40%7CEiBp%7BAql%40zAs%40%7CBoApCqBbB%7BAfBmBdBuBZq%40x%40wAxBcEhFgJdGyL%7C%40_BpBqDxBqD%7CBiDlIeOxvCokFboCu_Fb%7E%40eaBpEqItD%7DGfAkB%7EPwZjq%40mmAfCiE%7EBgD%7E%40kAtA_BlBoBlD_Dp_C%7DjB%7Cg%40qa%40lFaE%7Cn%40gg%40x%5CeXhCoBpLiJtNmLvC%7DBdB%7BAjA_AxAqAxEyD%7EGkFtV_SvH%7BFnFiEtv%40ym%40vLyJxXwTlOqLdrB%7D_BtFiEjAu%40hAq%40dBy%40zAm%40pCy%40xBc%40%60C%5DrCS%60CEvCBvqBdDhDBpKA%7CcDg%40jpCmC%7EXUlGKbB%3FhcAaA%60KGzK%40jEDzINvTz%40%7EIr%40pJbAzG%5EjDd%40%7CItAfG%7EAtz%40xQhc%40rJz%5DrHdFnArDhAhE%7CA%7CCrAfD%60B%7ECbBd_Bh%7B%40d%5DxQfAh%40hNvHhd%40fVjHbEfEhCxE%7ECjeBrmA%60FbDjAh%40lGlDxBtAvAbAxLtIzBjBfEbEfA%7C%40tApAt%40h%40tAv%40xBfApBz%40xBz%40hAf%40vBjAl%40XdLdEdCfAjDx%40nGrA%7CKtA%7CE%60%40fJ%60%40po%40%60B%60JXdXv%40%7CCFdQf%40vCD%7CDJ%7EWr%40%7CCDzCAxCG%7EEWbCWrC_%40%7CCg%40hCi%40zDeAbmAe%5Drd%40eMrEuArHmBrF%7BA%7EaAyXvN_EnBg%40fFcApDg%40nGg%40zDOvHBrGN%7CBLnGr%40%7CFdAhIjB%60MxCrH%7EAhk%40rMdGnAhIxB%60%7D%40fS%7CCx%40%60N%7CCpk%40fMzrBzd%40rDx%40vDr%40bDd%40pANdE%5EhFRdDHxV%5CzBElGB%60y%40dAvA%40nBOnCMfOPpWVrICh%40At%40Ix%40Q%5EMfBs%40%7ELsGr%40a%40%5EYn%40o%40v%40sAh%40qARw%40Jm%40JuA%3FgTDqAJm%40UgGOyBc%40gEiCoReB%7BOO%7BDE_CDkJLkMlB%7BrAn%40iZDaHP%7BLzB_nALwKRmLNkCZgDv%40kDr%40aBfAyBnA_C%7C%5Bei%40hJiOrl%40saAhQ_%5DtK%7DTvTyc%40%60AyB%7C%40_C%5CuAXiAf%40kCPoARiBDw%40%3FmEIwGq%40uWoAaf%40McG%40mEn%40s%60%40RgTfAow%40h%40sZ%40_GDwBGcC%5BcCm%40sA%7D%40yAuAwA%7BDuCyAaAyA_BmCgBaCkB%7DC%7DCeBsB_A%7DAwAaDuGyJ";
$byte_array = array_merge(unpack('C*', $string));
$results = array();

$index = 0; # tracks which char in $byte_array
do {
  $shift = 0;
  $result = 0;
  do {
    $char = $byte_array[$index] - 63; # Step 10
    
    $result |= ($char & 0x1F) << (5 * $shift);
    $shift++; $index++;
  } while ($char >= 0x20); # Step 8 most significant bit in each six bit chunk
    
  
  if ($result & 1)
    $result = ~$result;
  
  $result = ($result >> 1) * 0.00001;
  $results[] = $result;
} while ($index < count($byte_array));

for ($i = 2; $i < count($results); $i++) {
  $results[$i] += $results[$i - 2];
}


var_dump(array_chunk($results, 2));


?>
