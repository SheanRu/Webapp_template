<style>
  #filter-text-box {
  padding: 8px 12px;
  margin-left: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  font-size: 14px;
  transition: border-color 0.3s, box-shadow 0.3s;
}

#filter-text-box:focus {
  border-color: #007BFF;
  box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
  outline: none;
}

</style>

<!-- Main Content -->
<main class="main-content">
  <h1  class="title">Logs</h1>

  <div class="example-wrapper">
    <div class="example-header" style="display: flex;text-align: right;justify-content: right;margin-bottom:20px;align-items: center;"> <span>Search:</span>
      <input type="text" id="filter-text-box" oninput="onFilterTextBoxChanged()" />
    </div>
    <div id="myGrid" style="height: 500px"></div>
  </div>
</main>



<script src="https://cdn.jsdelivr.net/npm/ag-grid-community/dist/ag-grid-community.min.js"></script>
<script>
  const columnDefs = [{
      field: "athlete",
      minWidth: 170,
    },
    {
      field: "age"
    },
    {
      field: "country"
    },
    {
      field: "date"
    },
    {
      field: "total"
    },
  ];

  let gridApi;

  const gridOptions = {
    defaultColDef: {
      flex: 1,
      minWidth: 100,
    },
    columnDefs,
    paginationAutoPageSize: true,
    pagination: true,
  };
function onFilterTextBoxChanged() {
  gridApi.setGridOption(
    "quickFilterText",
    document.getElementById("filter-text-box").value,
  );
}
  // setup the grid after the page has finished loading
  document.addEventListener("DOMContentLoaded", function() {
    const gridDiv = document.querySelector("#myGrid");
    gridApi = agGrid.createGrid(gridDiv, gridOptions);

    fetch("https://www.ag-grid.com/example-assets/olympic-winners.json")
      .then((response) => response.json())
      .then((data) => gridApi.setGridOption("rowData", data));
  });
</script>