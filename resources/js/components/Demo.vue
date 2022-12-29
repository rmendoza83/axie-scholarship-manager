<template>
  <div>
    <h1>Tabla de Posiciones Team RAMS</h1>

    <DataTable
      :value="axieData"
      :paginator="true"
      :rows="30"
      sortField="mmr"
      :sortOrder="-1"
      responsiveLayout="scroll"
      :loading="loading"
    >
      <template #empty> No Hay Registros </template>
      <Column field="name" header="Nombre"></Column>
      <Column
        field="mmr"
        header="ELO"
        :sortable="true"
        headerClass="header-right"
      >
        <template #body="slotProps">
          <div class="d-flex flex-row justify-content-end align-items-center">
            <span class="px-1">
              {{ $filters.formatInteger(slotProps.data.mmr) }}
            </span>
            <i class="fa-solid fa-trophy fa-xs"></i>
          </div>
        </template>
      </Column>
      <Column
        field="win_rate"
        header="Win Rate"
        :sortable="true"
        headerClass="header-right"
      >
        <template #body="slotProps">
          <div class="d-flex flex-row justify-content-end align-items-center">
            <span class="px-1">
              {{ slotProps.data.win_rate }}
            </span>
          </div>
        </template>
      </Column>
      <Column
        field="rank"
        header="General Ranking"
        headerClass="header-right"
        :sortable="true"
      >
        <template #body="slotProps">
          <div class="d-flex justify-content-end">
            <span>{{ $filters.formatInteger(slotProps.data.rank) }}</span>
          </div>
        </template>
      </Column>
      <Column
        field="today_slp"
        header="SLP Hoy"
        headerClass="header-right"
        :sortable="true"
      >
        <template #body="slotProps">
          <div class="d-flex justify-content-end">
            <span>{{ $filters.formatInteger(slotProps.data.today_slp) }}</span>
          </div>
        </template>
      </Column>
      <Column
        field="total_slp"
        header="Total SLP"
        headerClass="header-right"
        :sortable="true"
      >
        <template #body="slotProps">
          <div class="d-flex justify-content-end">
            <span>{{ $filters.formatInteger(slotProps.data.total_slp) }}</span>
          </div>
        </template>
      </Column>
      <Column field="id" header="Ronin Id" headerClass="header-center">
        <template #body="slotProps">
          <div class="d-flex justify-content-center">
            <span style="font-family: courier, courier new">
              {{ slotProps.data.id }}
            </span>
          </div>
        </template>
      </Column>
    </DataTable>
  </div>
</template>

<script lang="ts">
import { Vue } from "vue-class-component";
import { DemoService } from "../services/demo/demo.service";
import { timer } from "rxjs";

export default class DemoComponent extends Vue {
  timeRefresher = 300000;
  private demoService: DemoService = new DemoService();
  private axieData: any[] = [];
  private loading: boolean = false;
  private refresher = timer(this.timeRefresher, this.timeRefresher);

  created() {
  }

  private getAxieData() {
    this.loading = true;
    this.demoService.getAxieData().subscribe((response) => {
      console.log(response.data);
      this.axieData = response.data.data;
      this.loading = false;
    });
  }

  mounted() {
    this.$nextTick().then(() => {
      this.getAxieData();
      this.refresher.subscribe(() => {
        this.getAxieData();
      });
    });
  }
}
</script>

<style lang="css">
.header-right > .p-column-header-content {
  display: flex;
  justify-content: right;
}

.header-center > .p-column-header-content {
  display: flex;
  justify-content: center;
}
</style>
