function convert(sValue, sDataType) {
    switch(sDataType) {
        case "int":
            return parseInt(sValue);
        case "float":
            return parseFloat(sValue);
        case "date":
            return new Date(Date.parse(sValue));
        default:
            return sValue.toString();
    }
}

function generateCompareTRs(iCol, sDataType) {

    return  function compareTRs(oTR1, oTR2) {
        let vValue1 = convert(oTR1.cells[iCol].firstChild.nodeValue, sDataType);
        let vValue2 = convert(oTR2.cells[iCol].firstChild.nodeValue, sDataType);

        if (vValue1 < vValue2) {
            return -1;
        } else if (vValue1 > vValue2) {
            return 1;
        } else {
            return 0;
        }
    };
}

function sortTable(sTableID, iCol, sDataType) {
    let oTable = document.getElementById(sTableID);
    let oTBody = oTable.tBodies[0];
    let colDataRows = oTBody.rows;
    let aTRs = new Array;

    for (let i=0; i < colDataRows.length; i++) {
        aTRs[i] = colDataRows[i];
    }

    if (oTable.sortCol == iCol) {
        aTRs.reverse();
    } else {
        aTRs.sort(generateCompareTRs(iCol, sDataType));
    }

    let oFragment = document.createDocumentFragment();
    for (let i=0; i < aTRs.length; i++) {
        oFragment.appendChild(aTRs[i]);
    }

    oTBody.appendChild(oFragment);
    oTable.sortCol = iCol;
}