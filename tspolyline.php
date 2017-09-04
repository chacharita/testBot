<?php

$string = "czlsAgdwdRwW?wW_GuVmHqRaK";
//$string = "$string = "iwsyAak%7CcRjGsPv%40yCf%40%7DCnD_MpC%7DOB%5BGMg%40Q_BeAe%40Q%7D%40OsCEUi%7B%40RkC%7C%40eEv%40kBhAmBjAwAtAgAS_%40o%40gAWWc%40SMCu%40%3F%7BIfBkgBp%5D_H%7EAsCt%40mDdAcGrBcC%7C%40%7BB%7C%40sGvC%7BH%7CDgFxCyGbEqF%7EC%7BLhHmY%7CPeh%40vZgGvD_DzBwBbByEdE%7BC%60DkBtBaElFmBxCsZlf%40sC%7EDgD%7EDwDvD%7BApAaEzC_EfCcDbB%7BBdAsqCtkAiCfAuEzByAv%40sC%60B%7DDdCaXpRa%7CBlaB%7DSrOoJxGiDfCsX%60S%7DB%7CAoBzAiVfQaBjAaDnBuAv%40uBhAiErBgR%60Iyf%40jT_aA%60b%40km%40zWuAp%40iA%60%40gQtHsFtBuGpB_EdAmDx%40%7BAZ%7DGhAqDb%40aO%60B_iA%7EL_Hx%40oGbAqCj%40sB%60%40yG%60BuOfFym%40hWkVjKqDxAcfA%7Ec%40iD%7CA_CjA%7BGtDeDrBeErCaGtE_GlFs%5Ed%5DgOhNoEvD%7DEtDiDbCuFpDex%40nf%40oh%40j%5BsZbRyA%60AmCnBaAt%40uCdCiDfDmD%7CD%7DBtCmDfFkY%7Cf%40oa%40vs%40kB%7CCwApBiC%60DgDnDsBjBcBtAwB%7EAaC%7CAcE%7CB_EjBkd%40vQ%7DKrEq%7C%40%7E%5DcHzC%7DG%7CCuKnEm%40TkErAsMdFuF%7CBgEjBmI%7ED%7DGpDkHhE%7DBvAia%40dXmTpNwAbAol%40n%60%40gHpEcDnBgGnDmGjD%7BGpDaFdCoI%60EkHfD%7DE%60C%7DaBlw%40wTfKoH%60DaDnAkK%7CDsIvCkJtCwDdAiJbCeJvB%7BDz%40yIbB%7B%5C%60GkHlAmAf%40sDr%40gAh%40qBn%40_A%5E%5DNq%40h%40_%40d%40Wb%40Sh%40K%5CSvAuA%60UAvA%40r%40ZtFjCdSdQrnAvApJd%40vBf%40%7CAfFbMbAbBjEhGvC%60Ejc%40nn%40rTzZjFfHt%5C%60f%40%7ED%7CEnSzPhMbKz%40v%40xAxAbAtAzA%7CBzPrXhQrYjNxTbHtLtKbQ%7CCjFfBbDfBwAhBqApBoApBwAdBeAhDaCpH%7BE%7EFcE%7CKaKlo%40gn%40z%40w%40XQxAu%40lAa%40%7EAWfAEp%40BfOnAfd%40hDIf%40Bf%40i%40pDCl%40X%7CK%7ECby%40r%40nS%3FlFSzB_%40%60Ck%40jB%5Dz%40iArBw%40fAsAzAeBtAiDrBcpAvt%40skAfq%40aDpBeMbHwDzBeBpAkAtAq%40hAw%40zAuBzFcBhEcGlHqJdLqGvJyCbEiDzF%5Dl%40wCnEy%40hAu%40z%40cAr%40uBbAYJwA%5CaCZeAB%7BB%3Fko%40UeFJiDb%40a%40Hm%40TuAr%40gDpC%5D%5C_UpXuAbBg%40x%40Yp%40UbAM%7C%40A%60ABfANz%40Vz%40%5E%7E%40b%40n%40d%40d%40%60An%40bBr%40tTvH%7CDpA%7E%40NhBT%60B%40%60%40D%7EAZjObFZNJJLX%40JEVgA%7EDMp%40%3Fz%40PpA%60%40%60Br%40t%40T%7EAAhAMn%40%3Ff%40Lz%40JdB%3FjBRh%40v%40%5Cd%40ZNVHTHJ%5CDr%40C%7EAc%40%60CkAdDeA%7C%40EdADlA%60%40%7EAt%40vFrEj%40JrA%3FDC";";
$byte_array = array_merge(unpack('C*', $string));
$results = array();

$index = 0;
do {
  $shift = 0;
  $result = 0;
  do {
    $char = $byte_array[$index] - 63; 
    
    $result |= ($char & 0x1F) << (5 * $shift);
    $shift++; $index++;
  } 
  while ($char >= 0x20); 
    
  
  if ($result & 1)
    $result = $result;
  
  $result = ($result >> 1) * 0.00001;
  $results[] = $result;
} while ($index < count($byte_array));

for ($i = 2; $i < count($results); $i++) {
  $results[$i] += $results[$i - 2];
}

var_dump(array_chunk($results, 2));


?>
