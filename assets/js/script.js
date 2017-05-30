class  Producto{
  constructor(nombre,precio,categoria,descripcion){
    this._nombre=nombre;
    this._precio = precio;
    this._categoria = categoria;
    this._descripcion = descripcion;
  }
 
  get nombre(){
    return this._nombre;
  }
  set nombre(nombre){
    this._nombre=nombre;
  }
  get precio(){
    return this._precio;
  }
  set precio(precio){
    this._precio=precio;
  }
  get categoria(){
    return this._categoria;
  }
  set categoria(categoria){
    this._categoria=categoria;
  }
  get descripcion(){
    return this._descripcion;
  }
  set descripcion(descripcion){
    this._descripcion=descripcion;
  }
}